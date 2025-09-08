<style>
    .modal-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #userImage {
        width: 250px;
        height: 200px;
        padding: 1rem;
    }

    .header {

        display: flex;
        justify-content: center;
    }
</style>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header header">
                <h4 class="modal-title" id="userModalLabel">ข้อมูลพนักงาน</h4>

            </div>
            <div class="modal-body modal-container">
                <!-- ข้อมูลผู้ใช้จะแสดงที่นี่ -->
                <img id="userImage" src="" alt="User Image">
                <p id="userName"></p>
                <p id="userNickName"></p>
                <p id="userTell"></p>
                <p id="userAge"></p>
                <p id="userAddree"></p>
                <p id="userDuty"></p>
                <p id="userSalary"></p>
                <p id="userStart"></p>
                <p id="userAdmin"></p>
            </div>
            <!-- ส่วนของ Modal ที่แสดงรายละเอียดผู้ใช้ -->
            <div class="modal-footer">
                <a href="#" id="deleteUserBtn" class="btn btn-danger">ลบ</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>