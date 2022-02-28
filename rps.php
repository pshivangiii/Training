<?php
session_start();
   $games_played=0;
   $games_won=0;
   $_SESSION['games_won']=0;
function computer_choice_generation()
{
    $computer = rand(1,3);
    if ($computer == 1) {
        $computer_choice = "rock";
        return $computer_choice;
    }    
    elseif ($computer == 2) {
        $computer_choice = "paper";
        return $computer_choice;
    } 
    else {
        $computer_choice = "scissors";
        return $computer_choice;
    }
}

function finalize_result($player_choice, $computer_choice){
   
    if ($player_choice == $computer_choice) {
        return 0;
    } elseif ($player_choice == "rock" && $computer_choice == "scissors") {
        return 1;
    } elseif ($player_choice == "scissors" && $computer_choice == "paper") {
        return 1;
    } elseif ($player_choice == "paper" && $computer_choice == "rock") {
        return 1;
    } else {
        return -1;
    }
}

function display_results($message, $player_choice, $computer_choice,$games_played,$games_won){
 
    $file = file_get_contents("result.html");
    $file = str_replace('{MESSAGE}', $message, $file);
    
    $file = str_replace('{CHOICE1}', $player_choice, $file);
    $file = str_replace('{CHOICE2}', $computer_choice, $file);
    $file = str_replace('{GAMES_PLAYED}', $games_played, $file);
    $file = str_replace('{GAMES_WON}', $games_won, $file);
    echo $file;
}

if(isset($_POST["choice"])){
    
    $player_choice = $_POST["choice"];    
    $computer_choice = computer_choice_generation();
    $message = "";
  
    $result = finalize_result($player_choice, $computer_choice);
    
    if ($result == 0) {
        $message = "TIE";
        $_SESSION['$games_played']=$_SESSION['$games_played']+1;
        $_SESSION['$games_won']=$_SESSION['$games_won'];
        if( $_SESSION['$games_won'] == null)
        {
            $_SESSION['$games_won']=0;
        }

    } elseif ($result == 1) {
        $message = "You won!";
        $_SESSION['$games_played']=$_SESSION['$games_played']+1;
        $_SESSION['$games_won']=$_SESSION['$games_won']+1;
    } else {
        $message = "Computer wins!";
        $_SESSION['$games_played']=$_SESSION['$games_played']+1;
        $_SESSION['$games_won']=$_SESSION['$games_won'];
        if( $_SESSION['$games_won'] == null)
        {
            $_SESSION['$games_won']=0;
        }
    }
    display_results($message, $player_choice, $computer_choice, $_SESSION['$games_played'],  $_SESSION['$games_won']);
}

if(!isset($_COOKIE[$cookie_name]))
{
	header("Location: logout.php");
}
?>