<div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#myModal">
                                            <i class="zmdi zmdi-plus"></i>+ Create Event</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-body">
                            <form method="post" action="event_popup_handler.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="event_tittle">Event Title</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input type="txt" class="form-control" id="email" name="event_tittle" placeholder="Title">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="event_description">Description</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input type="txt" class="form-control" id="pws" name="event_description" placeholder="Description">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    </div>
                                </div>

                                <div class ="form-group">
                                    <label for="e_address">Location</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input type="txt" class="form-control" id="pws" name="e_address" placeholder="address">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    </div>
                                </div>

                                <div class = "form-froup">
                                    <label for="e_time">Date</label>
                                    <div class = "input-group pb-modalreglog-inout-group">
                                        <input type="date-time" class = "form-control" name="e_time" id="pws">
                                        <span class = "input-group-addon"><span class ="glyphicon glyphicon-lock"></span></span>
                                    </div>

                                </div>

                                <div class="form-row">
                            <div class="name">event Attachment</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="attachment" id="file" required="required">
                                </div>
                                <div class="label--desc">Upload your Event Attachment</div>
                            </div>
                        </div>
                            <button class="btn btn-secondary">Create Event</button>
                            </form>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <style>
    .pb-modalreglog-container
    {
        margin-top: 100px;
    }

    .pb-modalreglog-legend
    {
        text-align: center;
    }

    .pb-modalreglog-input-group
    {
        margin: auto;
    }

    .pb-modalreglog-submit
    {
        margin-left: 5px;
    }

    .pb-modalreglog-form-reg
    {
        text-align: center;
    }

    .pb-modalreglog-footer p
    {
        text-align: center;
        margin-top: 20px;
    }

    #pb-modalreglog-progressbar
    {
        border-radius: 2px;
    }
</style>

<script>
    $(function () {
        var progress = $("#pb-modalreglog-progressbar").shieldProgressBar({
            value: 0
        }).swidget();

        $('#inputEmail').change(function () {
            if ($('#inputEmail').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#inputPws').change(function () {
            if ($('#inputPws').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#inputConfirmPws').change(function () {
            if ($('#inputConfirmPws').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#countries').change(function () {
            if ($('#countries').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#age').change(function () {
            if ($('#age').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#ch').change(function () {
            if ($('input[name="chs"]:checked').length > 0) {
                progress.value(progress.value() + 25);
            } else {
                progress.value(progress.value() - 25);
            }
        });

        $("#age").shieldMaskedTextBox({
            enabled: true,
            mask: "00/00/0000",
            value: "19/03/1032"
        });
    })
</script>

