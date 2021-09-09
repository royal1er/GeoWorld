<div id="container_pays_error">
    <img src="globe.jpg">
    <h2><?php echo $_GET['Name']?> n'existe pas</h2>
</div>
<style>
    #container_pays_error{
        position: relative;
        width: 100%;
        text-align: center;
        margin-top:15px;
    }
    #container_pays_error img{
        width: 100%;
    }
    #container_pays_error h2{
        position: absolute;
        top: 5px;
        display: flex;
        width: 100%;
        justify-content: center;
        color: #ef2d2d;
        font-size: 45px;
        font-weight: bold;
    }
</style>