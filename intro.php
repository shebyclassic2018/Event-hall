<div class="user pad-15 underline flex">
    <div class="flex-1">Welcome: <span class="capital-letter bold"><?=$_SESSION['username']?></span></div>
    <div class="flex-center">
        <span class="fa fa-power-off" id="logout"></span>
    </div>
</div>

<div class="logout-cover flex-center">
    <div class="box">
        <div class="box-title pad-8">Logout</div>
        <div class="content flex-center">Are you sure?</div>
        <div class="button flex">
            <div class="pad-8 flex-1 flex-center">
                <button class="btn btn-red round-5" id="cancel"><span class="fa fa-times-circle"></span> </button>
            </div>
            <div class="pad-8 flex-1 flex-center"><button class="btn btn-green round-5" id="confirm"><span class="fa fa-check-circle"></span> </button></div>
        </div>
    </div>
</div>