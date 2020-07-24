<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .mission {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }



        .back {
            border-style: none;
            background-color: cadetblue;
            padding: 10px 25px;
            border-radius: 10%;
            position: absolute;
            left: 380px;
            top: 15px;
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
    <div>
        <button class="back"><a href="topPage.php">Back</a></button>
    </div>



    <div class="mission">
        <header class="title">

            <h1>ミッション</h1>
            <img src="../LoveBirds&Co/img/6501.jpg" alt="" height="350px" width="650px">
        </header>
        <form action="missionMake_act.php" enctype="multipart/form-data" method="POST">
            <div>
                <label for="">
                    <h2 class="title_sub">締切:</h2>
                </label> <input type="date" name="deadLine" id="deadLine" autocomplete="off">
            </div>
            <div>
                <label for="">
                    <h2 class="title_sub"> 内容:</h2>
                </label> <input type="text" name="missionText" id="missionText" autocomplete="off" placeholder="例）料理(16：00まで)">
            </div>
            <div id="gohobi">
                <label for="">
                    <h2 class="title_sub"> ご褒美:</h2>
                </label> <input type="text" name="rewardText" id="rewardText" autocomplete="off" placeholder="例）旅行">
            </div>
            <div id="image">
                <label for="">
                    <h2 class="title_sub">image:</h2>
                </label>
                <input type="file" name="rewardImage" accept="image/*" autocomplete="off" capture="camera" id="rewardImage">
            </div>
            <div>

                <input type="submit" class="submit" value="保存">
            </div>
    </div>
    </form>

</body>

</html>