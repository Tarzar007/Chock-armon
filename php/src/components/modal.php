    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">บันทึกรายจ่าย</h5>
                    <button type="button" id="addButton" class="btn btn-primary">+</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" method="POST">
                            <div id="formfield">
                                <div class="row justify-content-center mb-4">
                                    <div class="col-6">
                                        <input require class="form-control form-control-lg" type="text" placeholder="รายการจ่าย">
                                    </div>
                                    <div class="col-6">
                                        <input require class="form-control form-control-lg" type="number" placeholder="ค่าใช้จ่าย">
                                    </div>

                                </div>
                            </div>
                            <button style="float: right;" type="button" id="removeButton" class="btn btn-danger">-</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                    <button type="button" class="btn btn-success">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>