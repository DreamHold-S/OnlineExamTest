<?php
session_start();
include "../connection.php";
$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count=0;
$ans = "";
$onoo = " онооны асуулт";
$score = 0;

//Select parameter ogow...........
$queno = $_GET["questionno"];

if(isset($_SESSION["answer"][$queno]))
{
    $ans = $_SESSION["answer"][$queno];
}
$res = mysqli_query($link,"select * from  questions where category = '$_SESSION[exam_category]'  && question_no = $_GET[questionno] ") or die (mysqli_errno($link));
$count = mysqli_num_rows($res);

if($count ==0){
    echo "over";
}
else
{
    while ($row = mysqli_fetch_array($res)){
        $question_no = trim($row["question_no"]);
        $question =  trim($row["question"]);
        $opt1 = trim($row["opt1"]);
        $opt2 = trim($row["opt2"]);
        $opt3 = trim($row["opt3"]);
        $opt4 = trim($row["opt4"]);
        $score = trim($row["score"]);

    }
    ?>
    <br>

    <table>
        <tr>
            <td  style="font-weight: bold; font-size: 18px; padding-left: 5px; color:royalblue; colspan="2"; >
            <?php echo "[ ".$score ." ] ".$onoo;  ?>
            </td>
        </tr>
    </table>


    <table>
        <tr>
            <td  style="font-weight: bold; font-size: 18px; padding-left: 5px; colspan="2">
            <?php echo "( ".$question_no ." ) ".$question;  ?>
            </td>
        </tr>
    </table>


    <table style="margin-left: 10px;">
        <tr>
            <td>
                <input type="radio" name="rl" id="rl"  value="<?php echo $opt1 ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)"
                    <?php
                    if($ans == $opt1) {
                        echo "checked";
                    }
                    ?>
                >
            </td>
            <td style="padding-left: 10px">
                <?php
                if(strpos($opt1,'images/') !=false)
                {
                    ?>
                    <img src="admin/<?php echo $opt1?>" height="30" width="30">
                    <?php
                }
                else
                {
                    echo $opt1;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input  type="radio" name="rl" id="rl"  value="<?php echo $opt2 ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
                <?php
                if($ans == $opt2){
                    echo "checked";
                }
                ?>
                >
            </td>

            <td style="padding-left: 10px">
                <?php
                if(strpos($opt2,'images/') !=false)
                {
                    ?>
                    <img src="admin/<?php echo $opt2?>" height="30" width="30">
                    <?php
                }
                else
                {
                    echo $opt2;
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>
                <input  type="radio" name="rl" id="rl"  value="<?php echo $opt3 ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)"
                <?php
                if($ans == $opt3){
                    echo "checked";
                }
                ?>
                >
            </td>

            <td style="padding-left: 10px">
                <?php
                if(strpos($opt3,'images/') !=false)
                {
                    ?>
                    <img src="admin/<?php echo $opt3?>" height="30" width="30">
                    <?php
                }
                else
                {
                    echo $opt3;
                }
                ?>
            </td>
        </tr>


        <tr>
            <td>
                <input  type="radio" name="rl" id="rl"  value="<?php echo $opt4 ?>" onclick="radioclick(this.value, <?php echo $question_no ?>)"
                    <?php
                    if($ans == $opt4){
                        echo "checked";
                    }
                    ?>
                >
            </td>

            <td style="padding-left: 10px">
                <?php
                if(strpos($opt4,'images/') !=false)
                {
                    ?>
                    <img src="admin/<?php echo $opt4?>" height="30" width="30">
                    <?php
                }
                else
                {
                    echo $opt4;
                }
                ?>
            </td>
        </tr>
    </table>
    <?php
}
?>