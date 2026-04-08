<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
// डेटाबेस से डेटा निकालने के लिए DB फ़सड (Facade) का उपयोग करें
use Illuminate\Support\Facades\DB;

class TelegramBotController extends Controller
{
    public function handleRequest()
    {
        // टेलीग्राम से अपडेट प्राप्त करें
        $updates = Telegram::getWebhookUpdates();

        // चेक करें कि क्या कोई मैसेज आया है
        if ($message = $updates->getMessage()) {
            $chatId = $message->getChat()->getId();
            $text = $message->getText();
            $command = trim(strtolower($text));

            $responseText = "";

            switch ($command) {
                case '/start':
                    $responseText = "नमस्ते! 🙏\nस्कूल सूचना बॉट में आपका स्वागत है।\n\n👉 'f' लिखें: फीस जानकारी\n👉 'd' लिखें: स्कूल विवरण\n👉 'p' लिखें: अपनी अनुपस्थिति (Attendance) चेक करें";
                    break;

                case 'f':
                case 'फ':
                    $responseText = "💰 **स्कूल फीस संरचना (Fee Structure)** 💰\n\nकक्षा 1-5: ₹2000/माह\nकक्षा 6-10: ₹3000/माह\n(यह एक डेमो जानकारी है।)";
                    break;

                case 'd':
                    $responseText = "🏫 **स्कूल विवरण (School Details)** 🏫\n\nनाम: आदर्श पब्लिक स्कूल\nपता: नई दिल्ली\nसंपर्क: 011-23456789";
                    break;

                // 'p' कमांड के लिए नया लॉजिक
                case 'p':
                    // डेटाबेस की 'attendances' टेबल से अनुपस्थिति (absent) गिनें
                    $absentCount = DB::table('attendances')
                        ->where('user_id', $chatId) // छात्र के टेलीग्राम चैट आईडी से मैच करें
                        ->where('student_attendance', 'absent') // जहाँ स्टेटस 'absent' हो
                        ->count(); // उनकी संख्या गिनें

                    // जवाब तैयार करें
                    $responseText = "📊 **उपस्थिति रिपोर्ट (Attendance Report)** 📊\n\nआपकी कुल अनुपस्थिति (Absent) की संख्या है: **{$absentCount}**";
                    break;

                default:
                    $responseText = "क्षमा करें, समझ नहीं आया।\nकृपया सही अक्षर लिखें:\n'f' - फीस\n'd' - विवरण\n'p' - अनुपस्थिति";
                    break;
            }

            // टेलीग्राम पर जवाब भेजें
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => $responseText,
                'parse_mode' => 'Markdown',
            ]);
        }

        // टेलीग्राम को 'ok' भेजें ताकि वह मैसेज को प्रोसेस हुआ माने
        return 'ok';
    }
}