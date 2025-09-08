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

    .title {
        margin-left: 12rem;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
        color: red;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="gas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title" id="exampleModalLabel">น้ำมันดีเซล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./controller/insert_gas.php" method="post">
                <input type="hidden" value="ดีเซล" name="txt_diesel">
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