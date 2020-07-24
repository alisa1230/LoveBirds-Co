<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .todo {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }



        .back {
            position: absolute;
            left: 380px;
            top: 15px;
            border-style: none;
            background-color: cadetblue;
            padding: 10px 25px;
            border-radius: 10%;
        }

        .back:hover {
            opacity: 0.6;
        }

        .title {
            color: DarkCyan;
            position: relative;
        }

        .back a {
            text-decoration: none;
            color: beige;
            font-size: 20px;
        }

        .title_sub {
            font-family: sans-serif;
            color: DarkCyan;
            font-size: 18px;
        }

        .submit {
            background-color: MediumAquaMarine;
            padding: 5px 15px;
            border-radius: 10%;
            color: beige;
            font-size: 18px;
            margin-top: 10px;
            border-style: none;
            font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
        }

        .submit:hover {
            opacity: 0.6;
        }

        input:focus {
            border-color: whitesmoke;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
            /* border-left: none;
            border-right: none;
            border-top: none; */
        }

        input:visited {
            background-color: whitesmoke;
        }

        input {
            padding: 5px 10px;
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
            font-size: 14px;
            font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;

            margin-bottom: 10px;
            color: Teal;
        }
    </style>
</head>

<body>
    <button class="back"><a href="topPage.php">Back</a></button>
    <form action="todoMake_act.php" method="POST">
        <div class="todo">
            <header class="title">
                <h1>ToDo</h1>

            </header>
            <img src="../LoveBirds&Co/img/5260.jpg" alt="" height="350px" width="650px">
            <form action="todoMake_act.php" method="POST">

                <div>
                    <label for="">
                        <h2 class="title_sub"> 日付:</h2>
                    </label> <input type="date" name="todoDate" id="todoDate" autocomplete="off">
                </div>
                <div>
                    <label for="">
                        <h2 class="title_sub"> 内容:</h2>
                    </label> <input type="text" name="todoText" id="todoText" autocomplete="off" placeholder="例）洗濯もの(16：00まで)">
                </div>
                <div>
                    <label for="">
                        <h2 class="title_sub">担当:</h2>
                    </label> <input type="text" name="todoName" id="todoName" autocomplete="off" placeholder="例）夫">
                </div>

                <!-- <div>
            <label for=""> ポイント:</label> <input type="number" name="">
        </div> -->
                <div>

                    <input type="submit" class="submit" value="保存">
                </div>
            </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>

        </script>

</body>

</html>