<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
// ✅ सुधार 1: सही मॉडल नाम इंपोर्ट करें
use App\Models\student_panel;
use App\Models\Attendance;

class RunTelegramBot extends Command
{
    protected $signature = 'bot:run';
    protected $description = 'Start polling for Telegram updates independently.';

    public function handle()
    {
        $this->info('🤖 टेलीग्राम स्कूल बॉट शुरू हो रहा है...');
        $this->info('बंद करने के लिए Ctrl + C दबाएं।');

        $lastUpdateId = 0;

        while (true) {
            try {
                $updates = Telegram::getUpdates(['offset' => $lastUpdateId + 1, 'timeout' => 30]);

                foreach ($updates as $update) {
                    $lastUpdateId = $update->getUpdateId();

                    if ($message = $update->getMessage()) {
                        $chatId = $message->getChat()->getId();
                        $text = trim($message->getText());
                        
                        $commandParts = explode(' ', $text);
                        $mainCommand = strtolower($commandParts[0]);

                        $this->info("मैसेज आया (Chat ID: $chatId): $text");

                        $responseText = "";

                        // --- कमांड लॉजिक ---

                        switch ($mainCommand) {
                            case '/start':
                                $responseText = "नमस्ते! 🙏\nस्कूल बॉट में आपका स्वागत है।\n\n**शुरुआत कैसे करें:**\nसबसे पहले अपना रोल नंबर रजिस्टर करें:\n`/register <आपका_रोल_नंबर>`\n(उदाहरण: `/register 101`)\n\nउसके बाद आप ये कमांड इस्तेमाल कर सकते हैं:\n👉 'p' - अपनी अटेंडेंस चेक करें\n👉 'f' - फीस जानकारी\n👉 'd' - स्कूल विवरण";
                                break;

                            // --- 1. रजिस्ट्रेशन कमांड (/register 101) ---
                            case '/register':
                                if (!isset($commandParts[1])) {
                                    $responseText = "⚠️ आपने रोल नंबर नहीं लिखा।\nकृपया ऐसे लिखें: `/register <आपका_रोल_नंबर>`\nउदाहरण: `/register 101`";
                                } else {
                                    $rollNumber = trim($commandParts[1]);

                                    // ✅ सुधार 2: यहाँ 'student_panel::' का उपयोग करें
                                    $student = student_panel::where('roll_number', $rollNumber)->first();

                                    if (!$student) {
                                        $responseText = "❌ यह रोल नंबर '{$rollNumber}' हमारे रिकॉर्ड में नहीं मिला। कृपया सही रोल नंबर दर्ज करें।";
                                    } 
                                    // (आपके स्ट्रक्चर में 'user_id' कॉलम में चैट आईडी सेव हो रही है)
                                    elseif ($student->user_id) {
                                        if ($student->user_id == $chatId) {
                                             $responseText = "✅ आप पहले से ही इस अकाउंट से रजिस्टर हैं!";
                                        } else {
                                             $responseText = "⚠️ यह रोल नंबर पहले से ही किसी दूसरे टेलीग्राम अकाउंट से जुड़ा है।";
                                        }
                                    } 
                                    else {
                                        // छात्र के 'user_id' कॉलम में टेलीग्राम चैट आईडी सेव करें
                                        $student->user_id = $chatId;
                                        $student->save();
                                        $responseText = "🎉 बधाई हो **{$student->name}**!\nआपका रजिस्ट्रेशन सफल रहा। अब आप 'p' लिखकर अपनी अटेंडेंस चेक कर सकते हैं।";
                                        $this->info("नया रजिस्ट्रेशन: {$student->name} (Roll: $rollNumber, ChatID: $chatId)");
                                    }
                                }
                                break;

                            // --- 2. 'p' कमांड (अटेंडेंस चेक) ---
                            case 'p':
                            case 'P':
                                // A. पता करें कि मैसेज भेजने वाला कौन छात्र है
                                // ✅ सुधार 3 (जहाँ एरर आया था): यहाँ भी 'student_panel::' करें
                                $student = student_panel::where('user_id', $chatId)->first();

                                if (!$student) {
                                    $responseText = "⚠️ आपका अकाउंट रजिस्टर नहीं है।\nकृपया पहले अपना रोल नंबर रजिस्टर करें:\n`/register <आपका_रोल_नंबर>`";
                                } else {
                                    // B. इस छात्र की अनुपस्थिति (absent) गिनें
                                    $absentCount = $student->attendances()
                                        ->where('student_attendance', 'absent')
                                        ->count();
                                    
                                    $responseText = "👤 **छात्र विवरण**\nनाम: {$student->name}\nरोल नं: {$student->roll_number}\n\n📊 **उपस्थिति रिपोर्ट**\nआपकी कुल अनुपस्थिति (Absent): **{$absentCount} दिन**";
                                }
                                break;

                            case 'f':
                            case 'फ':
                                $responseText = "💰 **फीस संरचना (डेमो)** 💰\n\n• कक्षा 1-5: ₹2000/माह\n• कक्षा 6-10: ₹3000/माह";
                                break;

                            case 'd':
                                $responseText = "🏫 **स्कूल विवरण (डेमो)** 🏫\n\nनाम: आदर्श पब्लिक स्कूल\nपता: नई दिल्ली\nसमय: 8 AM - 2 PM";
                                break;
                        }

                        if (empty($responseText) && strpos($text, '/') !== 0) {
                             $responseText = "समझ नहीं आया। 🤔\nसही कमांड के लिए /start देखें।";
                        }

                        if (!empty($responseText)) {
                            Telegram::sendMessage([
                                'chat_id' => $chatId,
                                'text' => $responseText,
                                'parse_mode' => 'Markdown',
                            ]);
                        }
                    }
                }
            } catch (\Exception $e) {
                $this->error("Error: " . $e->getMessage());
                sleep(5);
            }
        }
    }
}