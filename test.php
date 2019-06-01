<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Test - MTS Assort</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    
    <style>
        h3 {
            margin-left: 2vh;
            margin-right: 30vh;
            line-height: 3vh;
            margin-top: 3vh;
        }

        h3,
        h2,
        button {
            margin-left: 1vh;
            font-family: TruthCYR;
        }

        p,
        input {
            margin-left: 1.5vh;
        }

        button {
            border: none;
            background-color: #ff0000;
            color: aliceblue;
            margin-bottom: 10vh;
            border-radius: 10px;
            font-family: TruthCYR;
            font-size: 2vh;
            margin-top: 1.5vh;
        }

        #score {
            text-align: right;
            width:95%;
            font-family: TruthCYR;
            transition: color 1s ease, font-size .5s ease;
            font-size: 5vh;
            position:sticky;top:0;margin:1vh;
        }
        h1,h2,h3 {
            font-weight: 100;
        }
    </style>
    <script>
        function evaluation(num) {
            var rezz = 0;
            for (var i = 0; i < 8; ++i) {
                var queue = document.getElementById("t" + num + i).value;
                if (queue == "") queue = "0";
                rezz += parseInt(queue);
            }
            document.querySelector("#part" + num + "> #score").style.fontSize = "2vh";
            setTimeout(function() {
                document.querySelector("#part" + num + "> #score").style.fontSize = "7vh";
                setTimeout(function() {
                    document.querySelector("#part" + num + "> #score").style.fontSize = "5vh";
                }, 200);
            }, 100);
            document.querySelector("#part" + num + "> #score").innerHTML = rezz;
            if (rezz < 10) document.querySelector("#part" + num + "> #score").style.color = "#99ccff";
            else if (rezz == 10) document.querySelector("#part" + num + "> #score").style.color = "#99ff99";
            else if (rezz > 10 || document.querySelector("#part" + num + "> #score").innerHTML == "NaN") document.querySelector("#part" + num + "> #score").style.color = "#ff6666";
            
        }

    </script>
</head>

<body style="background-image:url('bg.png');">

    <h1 id="header" style="clip-path:polygon(0 0, 100% 0, 100% 100%, 90% 75%, 10% 75%, 0 100%);height:17.5vh;font-size:5vh">Тест</h1>
    <h1 id="filler" style="clip-path:polygon(0 0, 100% 0, 100% 100%, 90% 75%, 10% 75%, 0 100%);background-color:crimson;height:17.5vh;">placeholder</h1>
    <div id="group_cont" style='padding:1.5vh'>
    <h2>В каждом разделе распределите сумму в 10 баллов между утверждениями, которые, по Вашему мнению, лучше всего характеризуют Ваше поведение. Эти баллы можно распределить между несколькими утверждениями. В редких случаях все 10 баллов можно распределить между всеми утверждениями или отдать все 10 баллов какому-либо одному утверждению. Проверьте, чтобы сумма всех очков по каждому блоку не превышала 10 баллов.</h2>
    <hr>
    <div id='part1' style="position:relative">
        <div id='score'>0</div>
        <h2 style='position:absolute;top:0;'>1. Что я могу предложить команде:</h2>
        <h3>Я думаю, что в состоянии быстро воспринимать и использовать новые возможности</h3>
        <input onchange='evaluation(1)' type="text" name='jsondata' id="t10">
        <h3>Я легко кооперируюсь с людьми разных типов</h3>
        <input onchange='evaluation(1)' type="text" id="t11">
        <h3>Один из моих главных активов – продуцировать новые идеи</h3>
        <input onchange='evaluation(1)' type="text" id="t12">
        <h3>Я способен вовлекать людей, которые, по моему мнению, могут внести большой вклад в достижение групповых целей</h3>
        <input onchange='evaluation(1)' type="text" id="t13">
        <h3>Мои личные способности – эффективно доводить дело до самого конца</h3>
        <input onchange='evaluation(1)' type="text" id="t14">
        <h3>Я не представляю себе даже временного снижения своей популярности, даже если это приведет к увеличению прибыли</h3>
        <input onchange='evaluation(1)' type="text" id="t15">
        <h3>Обычно я чувствую, что реалистично и что дееспособно</h3>
        <input onchange='evaluation(1)' type="text" id="t16">
        <h3>Я способен предложить весомые аргументы в пользу другой линии действий, не провоцируя при этом предубеждений и предвзятости</h3>
        <input onchange='evaluation(1)' type="text" id="t17" style='margin-bottom:2vh'>
    </div>

    <hr>
    <div id='part2' style='position:relative'>
        <div id='score'>0</div>
        <h2 style='position:absolute;top:0;'>2. Что характеризует меня как члена команды:</h2>
        <h3>Я чувствую себя неуютно на собраниях, даже если они четко структурированы и продуманно организованны</h3>
        <input onchange='evaluation(2)' type="text" id="t20">
        <h3>Я склонен полагаться на людей, которые хорошо аргументируют свою точку зрения еще до того, как она была всесторонне обсуждена</h3>
        <input onchange='evaluation(2)' type="text" id="t21">
        <h3>Когда группа обсуждает новые идеи, я склонен слишком много говорить</h3>
        <input onchange='evaluation(2)' type="text" id="t22">
        <h3>Мои личные отношения мешают мне поддерживать коллег с энтузиазмом</h3>
        <input onchange='evaluation(2)' type="text" id="t23">
        <h3>Когда надо сделать какое-либо дело, некоторые люди считают, что я действую агрессивно и авторитарно</h3>
        <input onchange='evaluation(2)' type="text" id="t24">
        <h3>Я затрудняюсь брать на себя лидерскую роль, может потому, что слишком чувствителен к чувствам и настроениям группы</h3>
        <input onchange='evaluation(2)' type="text" id="t25">
        <h3>У меня есть склонность настолько увлекаться собственными идеями, что я забываю о том, что происходит вокруг</h3>
        <input onchange='evaluation(2)' type="text" id="t26">
        <h3>Мои коллеги считают, что я слишком забочусь о незначительных деталях и боюсь риска, что дело может быть испорчено</h3>
        <input onchange='evaluation(2)' type="text" id="t27" style='margin-bottom:2vh'>
    </div>

    <hr>
    <div id='part3' style='position:relative'>
        <div id='score'>0</div>
        <h2 style='position:absolute;top:0;'>3. Когда я работаю с другими над проектом:</h2>
        <h3>Я могу хорошо влиять на других людей, при этом не оказывая на них сильного давления</h3>
        <input onchange='evaluation(3)' type="text" id="t30">
        <h3>Мое «шестое чувство» подсказывает и предохраняет меня от ошибок и инцидентов, которые иногда случаются из-за небрежности</h3>
        <input onchange='evaluation(3)' type="text" id="t31">
        <h3>Во имя достижения главных целей, я готов ускорять события, не тратя время на обсуждение</h3>
        <input onchange='evaluation(3)' type="text" id="t32">
        <h3>От меня всегда можно ожидать чего-то оригинального</h3>
        <input onchange='evaluation(3)' type="text" id="t33">
        <h3>Я всегда готов поддержать хорошее предложение, которое принесет выгоду всем</h3>
        <input onchange='evaluation(3)' type="text" id="t34">
        <h3>Я постоянно отслеживаю последние идеи и новейшие достижения</h3>
        <input onchange='evaluation(3)' type="text" id="t35">
        <h3>Я думаю, что мои способности к суждениям и оценкам могут внести большой вклад в принятие правильных решений</h3>
        <input onchange='evaluation(3)' type="text" id="t36">
        <h3>На меня всегда можно положиться на завершающем этапе работы</h3>
        <input onchange='evaluation(3)' type="text" id="t37" style='margin-bottom:2vh'>
    </div>

    <hr>
    <div id='part4' style='position:relative'>
        <div id='score'>0</div>
        <h2 style='position:absolute;top:0;'>4. Мое отношение и интерес к групповой работе:</h2>
        <h3>Я искренне желаю узнать своих коллег получше</h3>
        <input onchange='evaluation(4)' type="text" id="t40">
        <h3>Я не боюсь ни оспаривать точку зрения другого человека, ни остаться в меньшинстве</h3>
        <input onchange='evaluation(4)' type="text" id="t41">
        <h3>Обычно я могу доказать несостоятельность неудачного предложения</h3>
        <input onchange='evaluation(4)' type="text" id="t42">
        <h3>Я думаю, что я способен хорошо выполнять любую функцию ради выполнения общего плана</h3>
        <input onchange='evaluation(4)' type="text" id="t43">
        <h3>Часто я избегаю очевидных решений и прихожу вместо этого к неожиданным решениям проблемы</h3>
        <input onchange='evaluation(4)' type="text" id="t44">
        <h3>Я стремлюсь все, что я делаю доводить до совершенства</h3>
        <input onchange='evaluation(4)' type="text" id="t45">
        <h3>Я готов использовать контакты вне группы</h3>
        <input onchange='evaluation(4)' type="text" id="t46">
        <h3>Хотя я всегда открыт различным точкам зрения, я не испытываю трудностей при принятии решения</h3>
        <input onchange='evaluation(4)' type="text" id="t47" style='margin-bottom:2vh'>
    </div>

    <hr>
    <div id="part5" style='position:relative'>
        <div id='score'>0</div>
        <h2 style='position:absolute;top:0;'>5. Я чувствую удовлетворение от работы, потому что:</h2>
        <h3>Мне нравится анализировать ситуации и оценивать возможные направления деятельности</h3>
        <input onchange='evaluation(5)' type="text" id="t50">
        <h3>Мне интересно находить практические пути решения проблемы</h3>
        <input onchange='evaluation(5)' type="text" id="t51">
        <h3>Мне приятно чувствовать, что я помогаю созданию хороших отношений на работе</h3>
        <input onchange='evaluation(5)' type="text" id="t52">
        <h3>Часто я имею сильное влияние на принимаемые решения</h3>
        <input onchange='evaluation(5)' type="text" id="t53">
        <h3>Я имею открытые, приветливые отношения с людьми, которые могут предложить что-то новенькое</h3>
        <input onchange='evaluation(5)' type="text" id="t54">
        <h3>Я могу убеждать людей в необходимости определенной линии действий</h3>
        <input onchange='evaluation(5)' type="text" id="t55">
        <h3>Я чувствую себя хорошо дома, когда я могу уделить максимум внимания заданию</h3>
        <input onchange='evaluation(5)' type="text" id="t56">
        <h3>Я люблю работать с чем-то, что стимулирует мое воображение</h3>
        <input onchange='evaluation(5)' type="text" id="t57" style='margin-bottom:2vh'>
    </div>

    <hr>
    <div id='part6' style='position:relative'>
        <div id='score'>0</div>
        <h2 style='position:absolute;top:0;'>6. Когда задание трудное и незнакомое:</h2>
        <h3>Я откладываю дело на время и размышляю над проблемой</h3>
        <input onchange='evaluation(6)' type="text" id="t60">
        <h3>Я готов сотрудничать с людьми, которые более позитивно и с большим энтузиазмом относятся к проблеме</h3>
        <input onchange='evaluation(6)' type="text" id="t61">
        <h3>Я пытаюсь сделать задание проще, подыскивая людей в группе, которые могут взять на себя решение части проблемы</h3>
        <input onchange='evaluation(6)' type="text" id="t62">
        <h3>Мое врожденное ощущение времени позволяет мне выдерживать сроки выполнения задания</h3>
        <input onchange='evaluation(6)' type="text" id="t63">
        <h3>Я думаю, мне удастся сохранить ясность мысли и спокойствие</h3>
        <input onchange='evaluation(6)' type="text" id="t64">
        <h3>Даже под давлением внешних обстоятельств я не отступаю от цели</h3>
        <input onchange='evaluation(6)' type="text" id="t65">
        <h3>Я готов взять лидерские обязанности на себя, если я чувствую, что группа не прогрессирует</h3>
        <input onchange='evaluation(6)' type="text" id="t66">
        <h3>Я бы начал дискуссию с целью стимулировать появление новых мыслей, способствующих решению проблемы</h3>
        <input onchange='evaluation(6)' type="text" id="t67" style='margin-bottom:2vh'>
    </div>

    <hr>
    <div id='part7' style='position:relative'>
        <div id='score'>0</div>
        <h2 style='position:absolute;top:0;'>7. Проблемы, возникающие при работе в группах:</h2>
        <h3>Я склонен выражать свое нетерпение по отношению к людям, которые стоят на пути развития прогресса (мешают)</h3>
        <input onchange='evaluation(7)' type="text" id="t70">
        <h3>Другие могут критиковать меня за то, что я слишком аналитичен и не подключаю интуицию</h3>
        <input onchange='evaluation(7)' type="text" id="t71">
        <h3>Мое желание убедиться в том, что работа выполняется с высоким качеством, может иногда привести к задержке</h3>
        <input onchange='evaluation(7)' type="text" id="t72">
        <h3>Мне быстро все надоедает, и я полагаюсь на то, что кто-то из группы стимулирует мой интерес</h3>
        <input onchange='evaluation(7)' type="text" id="t73">
        <h3>Мне трудно приступить к решению задачи, не имея четкой цели</h3>
        <input onchange='evaluation(7)' type="text" id="t74">
        <h3>Иногда мне трудно объяснить и описать проблему в комплексе</h3>
        <input onchange='evaluation(7)' type="text" id="t75">
        <h3>Я знаю, что я требую от других того, что я сам не могу выполнить</h3>
        <input onchange='evaluation(7)' type="text" id="t76">
        <h3>Я затрудняюсь выражать собственное мнение, когда я нахожусь в очевидной оппозиции к большинству</h3>
        <input onchange='evaluation(7)' type="text" id="t77">
    </div>
    <br>
    <button onclick="calculate()">Отправить</button>
    </div>
</body>

</html>
