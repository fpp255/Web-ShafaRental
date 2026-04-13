<form id="salsa" method="POST" accept-charset="utf-8">
    <div class="form-group">
        <div class="input Nomer">
            <label for="Nomer">Your Number</label>
            <input placeholder="62812xxxx" name="nomer" type="number" class="form-control" id="nomer" required />
        </div>
    </div>
    <div class="form-group">
        <div class="input nama">
            <label for="nama">Your Name</label>
            <input placeholder="nama" name="nama" type="text" class="form-control" id="nama" required />
        </div>
    </div>
    <div class="form-group">
        <div class="input pesan">
            <label for="pesan">Message</label>
            <textarea class="form-control" rows="4" id="pesan" name="pesan" placeholder="pesan"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="submit"><button type="submit" id="btn-wa" class="btn btn-primary btn-user btn-block">Send</button>
    </div>
</form>

<script type="text/javascript">
    $("#btn-wa").click(function(){
        var nomor = document.getElementById('nomer').value;
        var pesan = document.getElementById('pesan').value;
        var win = window.open('https://api.whatsapp.com/send?phone='+nomor+'&text='+pesan);
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            alert('Please allow popups for this website');
        }
    return false;
    });
</script>