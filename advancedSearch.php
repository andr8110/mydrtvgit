<?php
// check if the user is logged in
// if not logged in - take the user to the login page
session_start();
if (!$_SESSION['jUser']) {
    header('location: login.php');
}

$sTitle = 'Seach';

$sCss = 'index.css';

require_once './components/top.php';
require_once './components/navSide.php';
?>

<div id='page-content-wrapper'>
    <h1 class='advancedSearchHeader1'>Advanced Search</h1>
    <form id='frmAdvancedSearch'>
        <input type="text" class='inputTextField' name="txtTitle" placeholder='title'>
        <input type="text" class='inputTextField' name="txtProduction" placeholder='Produktion (Disney, Warner Bros...'>
        <input type="text" class='inputTextField' name="txtYear" placeholder='Year'>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary active">
                <input id='radioButtonMovies' type="radio" name="radioCategory" id="option1" autocomplete="off" value='1' checked> Movies
            </label>
            <label class="btn btn-secondary">
                <input id='radioButtonSeries' type="radio" name="radioCategory" id="option2" autocomplete="off" value='2'> Series
            </label>
        </div>
        <button class="btn btn-primary" id='btnSearch' type='submit'>Search</button>
       

    </form>
    <h2 id='advancedSearchResultHeader2'>Results</h2>
    <div id='advancedSearchResultContainer'>
        
    </div>

</div>





<?php 
$sScript = 'Advancedsearch.js';
require_once './components/bottom.php';