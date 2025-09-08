<style>
    .modal-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    #gas_pice {
        padding: 1rem;
        margin: 1rem;
        border-top: none;
        border-right: none;
        border-left: none;
        outline: none;
        border-bottom: 1px solid skyblue;
        text-align: center;
    }

    .title1 {
        margin-left: 12rem;

        color: green;
    }
</style>
<!-- Modal -->

<div class="modal fade" id="benzin1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title1" id="exampleModalLabel">น้ำมันเบนซิน91</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../controller/insert_benzin1.php" method="post">
                <input type="hidden" value="เบนซิน91" name="txt_benzin91">
                <div class="modal-body">
                    <input type="number" require name="gas_pice" id="gas_pice" placeholder="ราคา">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btn_gas" class="btn btn-success">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>