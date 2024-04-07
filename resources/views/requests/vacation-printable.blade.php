<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <style>
        @media print {
            button { display: none; }
        }
        html{
            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container mx-auto p-4 print-rtl text-xl">
    <div class="flex flex-row justify-between mb-10">
        <h3>رقم: {{$request->id}}</h3>
        <h3>بني ملال، في: {{$request->created_at->format('d/m/Y')}}</h3>
    </div>
    <div class="flex flex-col justify-center items-center text-lg font-semibold mb-10">
        <h1>مقرر</h1>
        <h2>عطلة إدارية</h2>
    </div>
    <p class="mb-2">إن رئيس قسم الشؤون الإدارية و المالية لوكالة الحوض المائي لأم الربيع ببني ملال.</p>
    <p class="mb-2">بمقتضى الضهير الشريف رقم 1.58.008 الصادر في ربيع الأول 1432 (18 فبراير 2011) بتنفيذ القانون رقم 50.05 بتغيير و تتميم الضهير الشريف رقم 1.58.008 الصادر في شعبان 1377 (24 فبراير 1958) بمثابة النضام الأساسي للوضيفة العمومية، و لا سيما الفصل 40 منه.</p>
    <p>و بناء على النضام الأساسي لموضفي وكالات الأحواض المائية المصادق عليه بتاريخ 12 يوليوز 2010 و حسب ما تم تغييره و تتميه بتاريخ 27 ماي 2014.</p>
    <p>بناء على الطلب المقدم من طرف السيد <span class="font-semibold">{{$request->fullname_ar}}</span> بتاريخ <span class="font-semibold">{{$request->start_date->format('d/m/Y')}}</span></p>
    <div class="flex justify-center text-lg">
        <h1 class="font-semibold mb-10 mt-10">يقرر ما يلي:</h1>
    </div>
    <p class="mb-10"><span class="font-bold underline">الفصل الأول:</span> ابتداء من  <span class="font-semibold">{{$request->start_date->format('d/m/Y')}}</span> تمنح رخصة إدارية للسيد <span class="font-semibold">{{$request->fullname_ar}}</span>، لمدة <span class="font-semibold">{{$request->duration}}</span> أيام عمل تطابق حقه في العطلة لسنة <span class="font-semibold">{{$request->start_date->format('Y')}}.</span></p>
    <p class="mb-10"><span class="font-bold underline">الفصل الثاني:</span> يحتفض المعني بالأمر ب <span class="font-semibold">{{$request->employee->previous_year_days}}</span> يوم عمل كبقية حقه في العطلة برسم سنة <span class="font-semibold">{{$request->start_date->copy()->subYear()->format('Y')}}</span> و <span class="font-semibold">{{$request->employee->current_year_days}}</span> يوم برسم سنة <span class="font-semibold">{{$request->start_date->format('Y')}}.</span></p>
    <p class="mb-10"><span class="font-bold underline">الفصل الثالث:</span> ينوب عن المعني بالأمر طيلة الرخصة السيد : .................................. </p>
    <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded">Imprimer</button>
</body>
</html>
