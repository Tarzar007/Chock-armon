<style>
    .modal-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    #equi_pice {
        padding: 1rem;
        margin: 1rem;
        border-top: none;
        border-right: none;
        border-left: none;
        outline: none;
        border-bottom: 1px solid skyblue;
        text-align: center;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="equipment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../controller/insert_equipment.php" method="post">
                <input type="hidden" value="วัสดุและอุปกรณ์" name="txt_eq" id="txt_eq">
                <div class="modal-body">
                    <input type="number" require name="equi_pice" id="equi_pice" placeholder="ราคา">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btn_e" class="btn btn-success">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>