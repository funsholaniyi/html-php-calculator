<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Web Calculator</title>
    <style>
        body {
            background-color: #FFB504;
            margin: 0px;;
        }

        #mainframe {
            width: 350px;
            margin-top: 100px;
            border-radius: 15px;
            -moz-box-shadow: 0 5px 10px #A29175;
            -webkit-box-shadow: 0 5px 10px #A29175;
            box-shadow: 0 5px 10px #A29175;
            height: 500px;
            margin: auto;
            background-color: #cccccc;
            padding: 5px;
            color: #000;
        }

        #name {
            color: #000;
            font-family: "Arial Black", Gadget, sans-serif;
            font-style: italic;
            font-size: 30px;
            font-weight: bold;
        }

        #screen {
            background-color: #6D6752;
            width: 330px;
            height: 40px;
            margin: auto;
            color: #000;
            margin-top: 5px;
            border-radius: 5px;
            font-size: 20px;
            padding: 3px;
            font-family: "Lucida Console", Monaco, monospace;
        }

        #controlpanel {
            float: right;
            width: 40px;
            height: 70px;
        }

        .control {
            width: 40px;
            height: 30px;
            cursor: pointer;
            background-color: #F00;
            border: #999 2px solid;
            padding: 3px;
            margin-top: 5px;
            color: #FFF;
            font-weight: bold;
        }

        #operationspanel {
            float: right;
            margin-top: 0px;
            width: auto;
            height: auto;
            margin-right: 0px;
        }

        .operations {
            width: 70px;
            height: 30px;
            cursor: pointer;
            padding: 3px;
            margin-top: 5px;
            color: #000;
            font-weight: bold;
            background-color: #C90;
        }

        #numberpanel {
            float: left;
            margin-top: 50px;
            width: auto;
            margin-left: 20px;
            height: auto;
        }

        .numbers {
            width: 70px;
            height: 30px;
            cursor: pointer;
            padding: 3px;
            margin-top: 10px;
            margin-right: 10px;
            color: #000;
            font-weight: bold;
        }

        #functionpanel {
            float: left;
            width: auto;
            margin-left: 10px;
            height: auto;
            margin-top: 20px;
        }

        .functions {
            width: 50px;
            height: 30px;
            cursor: pointer;
            padding: 3px;
            margin-top: 5px;
            margin-right: 5px;
            color: #000;
            font-weight: bold;
            background-color: #0C3;
        }
    </style>
</head>

<body>

<article id="mainframe"><span id="name">Calculator</span>

    <form method="post" action="index.php">
        <div id="screen">
            <?php
            require_once("engine/eos.class.php");
            session_start();
            @$_SESSION["SESS_INC"];
            if (!isset($_SESSION["STATE"])) {
                $_SESSION["STATE"] = false;
            }
            if (isset($_POST["on"])) {
                $state = true;
                if (isset($_SESSION['ARR'])) {
                    $_SESSION = array();
                }
                $_SESSION["STATE"] = $state;
            }
            if (isset($_POST["off"])) {
                $state = false;
                if (isset($_SESSION['ARR'])) {
                    $_SESSION = array();
                }
                $_SESSION["STATE"] = $state;
            }

            if ($_SESSION["STATE"]) {
                echo "<small style='float:right; padding:2px; font-size:10px;'>ON</small><br />";
                if (isset($_POST['nine'])) $valuePressed = 9;
                if (isset($_POST['eight'])) $valuePressed = 8;
                if (isset($_POST['seven'])) $valuePressed = 7;
                if (isset($_POST['six'])) $valuePressed = 6;
                if (isset($_POST['five'])) $valuePressed = 5;
                if (isset($_POST['four'])) $valuePressed = 4;
                if (isset($_POST['three'])) $valuePressed = 3;
                if (isset($_POST['two'])) $valuePressed = 2;
                if (isset($_POST['one'])) $valuePressed = 1;
                if (isset($_POST['zero'])) $valuePressed = 0;

                if (isset($_POST['add'])) $valuePressed = " + ";
                if (isset($_POST['sub'])) $valuePressed = " - ";
                if (isset($_POST['mut'])) $valuePressed = " * ";
                if (isset($_POST['div'])) $valuePressed = " / ";

                if (isset($_POST['point'])) $valuePressed = ".";
                if (isset($_POST['neg'])) $valuePressed = "-";

                if (isset($_POST['sin'])) $valuePressed = "sin(";
                if (isset($_POST['cos'])) $valuePressed = "cos(";
                if (isset($_POST['tan'])) $valuePressed = "tan(";
                if (isset($_POST['abs'])) $valuePressed = "abs(";
                if (isset($_POST['sqrt'])) $valuePressed = "^(1/2)";
                if (isset($_POST['sqr'])) $valuePressed = "^2";
                if (isset($_POST['power'])) $valuePressed = "^";
                if (isset($_POST['log10'])) $valuePressed = "log(";
                if (isset($_POST['exp'])) $valuePressed = "exp(";
                if (isset($_POST['exp10'])) $valuePressed = "E-";
                if (isset($_POST['inv'])) $valuePressed = "^-1";
                if (isset($_POST['oBrac'])) $valuePressed = "(";
                if (isset($_POST['cBrac'])) $valuePressed = ")";
                if (isset($_POST['factorial'])) $valuePressed = "!";
                if (isset($_POST['clr'])) {

                    $_SESSION['ARR'] = array();
                }


                if (isset($valuePressed)) {

                    if (!isset($_SESSION["SESS_INC"])) {
                        $_SESSION['ARR'] = array();
                        $_SESSION["SESS_INC"] = 1;
                    }

                    array_push($_SESSION['ARR'], $valuePressed);
                    foreach ($_SESSION['ARR'] as $val) {

                        for ($x = 0; $x < count($_SESSION['ARR']); $x++) {
                            @$va = @$val;
                            @$va .= @$val[$x];

                            if (is_array($val)) {

                            }
                        }

                        echo $va;

                    }

                }
                if (isset($_POST['del'])) {
                    $i = count($_SESSION['ARR']);
                    $ar = $_SESSION['ARR'];
                    unset($ar[$i - 1]);
                    foreach ($ar as $val) {

                        for ($x = 0; $x < count($_SESSION['ARR']); $x++) {
                            @$va = @$val;
                            @$va .= @$val[$x];
                        }

                        echo $va;
                        $_SESSION['ARR'] = $ar;
                    }
                }

                if (isset($_POST['equ'])) {
                    $values = (implode(" ", $_SESSION['ARR']));
                    $value = str_replace(" ", "", $values);

                    $y = substr($value, strlen($value) - 1, 1);
                    if (!is_numeric($y) && $y != ")") {
                        echo "Syntax error";
                    } else {
                        $eq = new eqEOS;
                        echo $eq->solveIF($value);
                        $_SESSION['ARR'] = array();
                    }
                }
            } else {
                echo "<small style='float:right; padding:2px; font-size:10px;'>OFF</small><br />";
            }

            ?>
        </div>
        <aside id="controlpanel">
            <input type="submit" class="control" value="On" name="on"/><br/>
            <input type="submit" class="control" value="Off" name="off"/><br/>
        </aside>
        <aside id="functionpanel">
            <input type="submit" value="sin()" name="sin" class="functions"/>
            <input type="submit" value="cos()" name="cos" class="functions"/>
            <input type="submit" value="tan()" name="tan" class="functions"/>
            <input type="submit" value="x^y" name="power" class="functions"/>
            <input type="submit" value="log10()" name="log10" class="functions"/><br/>
            <input type="submit" value="n!" name="factorial" class="functions"/>
            <input type="submit" value="sqrt()" name="sqrt" class="functions"/>
            <input type="submit" value="x^2" name="sqr" class="functions"/>
            <input type="submit" value="e^x" name="exp" class="functions"/>
            <input type="submit" value="ln()" name="ln" class="functions"/><br/>
            <input type="submit" value="(" name="oBrac" class="functions"/>
            <input type="submit" value=")" name="cBrac" class="functions"/>
            <input type="submit" value="1/x" name="inv" class="functions"/>
            <input type="submit" value="E" name="exp10" class="functions"/>
            <input type="submit" value="abs()" name="abs" class="functions"/><br/>
            <input type="submit" value=" " name="nine" class="functions"/>
            <input type="submit" value=" " name="nine" class="functions"/>
            <input type="submit" value=" " name="nine" class="functions"/>
            <input type="submit" value=" " name="nine" class="functions"/>
            <input type="submit" value=" " name="nine" class="functions"/><br/>
            <input type="submit" value=" " name="nine" class="functions"/>
            <input type="submit" value=" " name="nine" class="functions"/>
            <input type="submit" value=" " name="nine" class="functions"/>
            <input type="submit" value="CLR" name="clr" class="functions"/><br/>
        </aside>
        <aside id="numberpanel">
            <input type="submit" value="9" name="nine" class="numbers"/>
            <input type="submit" value="8" name="eight" class="numbers"/>
            <input type="submit" value="7" name="seven" class="numbers"/><br/>
            <input type="submit" value="6" name="six" class="numbers"/>
            <input type="submit" value="5" name="five" class="numbers"/>
            <input type="submit" value="4" name="four" class="numbers"/><br/>
            <input type="submit" value="3" name="three" class="numbers"/>
            <input type="submit" value="2" name="two" class="numbers"/>
            <input type="submit" value="1" name="one" class="numbers"/><br/>
            <input type="submit" value="." name="point" class="numbers"/>
            <input type="submit" value="0" name="zero" class="numbers"/>
            <input type="submit" value="-" name="neg" class="numbers"/><br/>


        </aside>
        <aside id="operationspanel">
            <input type="submit" value="DEL" name="del" class="numbers"/><br/>
            <input type="submit" value="+" name="add" class="operations"/><br/>
            <input type="submit" value="-" name="sub" class="operations"/><br/>
            <input type="submit" value="*" name="mut" class="operations"/><br/>
            <input type="submit" value="/" name="div" class="operations"/><br/>
            <input type="submit" value="=" name="equ" class="operations"/><br/>
        </aside>
    </form>
</article>
</body>
</html>