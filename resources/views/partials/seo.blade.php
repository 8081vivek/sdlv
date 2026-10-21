@php
    $siteName = 'B.S.D.L.V. Inter College';
    $seoTitle = trim($title ?? $siteName);
    $seoDescription = trim($description ?? 'B.S.D.L.V. Inter College is located in Mohddinpur Naibasti, Madhoganj, Hardoi, Uttar Pradesh.');
    $canonicalUrl = url()->current();
    $seoImage = asset('image/logo.jpeg');
@endphp

<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ $canonicalUrl }}">

<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:image" content="{{ $seoImage }}">

<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

@if (!empty($includeSchoolSchema))
    <script type="application/ld+json">
        @php
            echo json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'School',
            'name' => $siteName,
            'url' => $canonicalUrl,
            'logo' => $seoImage,
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Mohddinpur Naibasti, Madhoganj',
                'addressLocality' => 'Hardoi',
                'addressRegion' => 'Uttar Pradesh',
                'addressCountry' => 'IN',
                'postalCode' => '241302',
            ],
            ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
        @endphp
    </script>
@endif