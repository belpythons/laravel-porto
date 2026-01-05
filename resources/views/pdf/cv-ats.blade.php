<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Resume - {{ $profile['nama'] }}</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.3;
            color: #000;
            background: #fff;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24pt;
            font-weight: bold;
            margin: 0 0 5px 0;
            text-transform: uppercase;
        }

        .contact-info {
            font-size: 10pt;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 1px solid #000;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        .item {
            margin-bottom: 10px;
        }

        .item-header {
            width: 100%;
        }

        .item-title {
            font-weight: bold;
            font-size: 12pt;
            float: left;
        }

        .item-date {
            float: right;
            font-style: italic;
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        .item-subtitle {
            font-style: italic;
            clear: both;
        }

        .description {
            margin-top: 2px;
            text-align: justify;
        }

        ul {
            margin-top: 2px;
            margin-bottom: 5px;
            padding-left: 20px;
        }

        li {
            margin-bottom: 2px;
        }

        .skills-table {
            width: 100%;
            border-collapse: collapse;
        }

        .skills-row {
            margin-bottom: 5px;
        }

        .skill-category {
            font-weight: bold;
            width: 120px;
            vertical-align: top;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>{{ $profile['nama'] }}</h1>
        <div class="contact-info">
            {{ $profile['location'] }} • {{ $profile['phone'] }} • {{ $profile['email'] }} <br>
            @foreach($profile['socials'] as $social)
                {{ $social['url'] }} @if(!$loop->last) • @endif
            @endforeach
        </div>
    </div>

    <!-- SUMMARY -->
    <div class="section-title">Professional Summary</div>
    <div class="description">
        {{ $profile['deskripsi'] }}
    </div>

    <!-- EXPERIENCE -->
    <div class="section-title">Work Experience</div>
    @foreach ($experiences as $exp)
        <div class="item">
            <div class="item-header clearfix">
                <span class="item-title">{{ $exp['title'] }} | {{ $exp['company'] }}</span>
                <span class="item-date">{{ $exp['year'] }}</span>
            </div>
            <div class="description">
                {{ $exp['description'] }}
            </div>
        </div>
    @endforeach

    <!-- EDUCATION -->
    <div class="section-title">Education</div>
    @foreach ($education as $edu)
        <div class="item">
            <div class="item-header clearfix">
                <span class="item-title">{{ $edu['school'] }}</span>
                <span class="item-date">{{ $edu['year'] }}</span>
            </div>
            <div class="item-subtitle">{{ $edu['degree'] }}</div>
            <div class="description">
                {{ $edu['description'] }}
            </div>
        </div>
    @endforeach

    <!-- PROJECTS -->
    <div class="section-title">Projects</div>
    @foreach ($projects as $project)
        <div class="item">
            <div class="item-header clearfix">
                <span class="item-title">{{ $project['title'] }}</span>
            </div>
            <div class="item-subtitle">Tech: {{ implode(', ', $project['tech'] ?? []) }}</div>
            <div class="description">
                {{ $project['description'] }} <br>
                Link: {{ $project['link'] }}
            </div>
        </div>
    @endforeach

    <!-- SKILLS -->
    <div class="section-title">Skills</div>
    <table class="skills-table">
        @foreach ($skills as $cat)
            <tr class="skills-row">
                <td class="skill-category">{{ $cat['category'] }}</td>
                <td>
                    @foreach($cat['skills'] as $skill)
                        {{ $skill['name'] }}@if(!$loop->last), @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>

</body>

</html>