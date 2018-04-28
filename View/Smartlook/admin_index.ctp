<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $Lang->get("MAIN_TITLE"); ?></h3> <span style="float:right;"><?= $Lang->get("PLUGIN_DEVELOPED_BY"); ?></span>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-5">
                            <p style="font-weight:bold;font-style:italic;"><?= $Lang->get("SMARTLOOK_PRESENTATION_TITLE"); ?></p>
                            <p style="text-align:justify;font-style:italic;"><?= $Lang->get("SMARTLOOK_PRESENTATION_SUBTITLE"); ?></p>
                        </div>
                    </div>

                    <h4 style="margin-top: 50px;"><span class="fa fa-question-circle"></span> <?= $Lang->get("HELP"); ?></h4>

                    <div style="margin-left:15px;" class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="smartlook-headingHelp">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-headingHelp" aria-expanded="false" aria-controls="collapse-headingHelp">
                                        <?= $Lang->get("WHERE_TRACKING_NUMBER"); ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-headingHelp" class="panel-collapse collapse" role="tabpanel" aria-labelledby="smartlook-headingHelp">
                                <div class="panel-body">
                                    <p><?= $Lang->get("HELP_STEP_1"); ?><br>
                                    <?= $this->Html->image('SmartLook.step-1.jpg', ['alt' => 'step-1-smartlook']); ?></p>
                                    <br>
                                    <p><?= $Lang->get("HELP_STEP_2"); ?><br>
                                    <?= $this->Html->image('SmartLook.step-2.jpg', ['alt' => 'step-2-smartlook']); ?></p>
                                    <br>
                                    <p><?= $Lang->get("HELP_STEP_3"); ?><br>
                                    <?= $Lang->get("HELP_STEP_4"); ?><br>
                                    <?= $this->Html->image('SmartLook.step-3-4.jpg', ['alt' => 'step-3-4-smartlook']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 style="margin-top:30px;"><span class="fa fa-file-text"></span> <?= $Lang->get("CONFIGURATION_TITLE"); ?></h4>

                    <form method="post" action="<?= $this->Html->url(["controller" => "Smartlook", "action" => "index", "admin" => true]); ?>">
                        <div class="form-group col-md-6">
                            <label class="control-label"><?= $Lang->get("TRACKING_CODE_LABEL_TITLE"); ?></label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-code"></span></span>
                                <input type="text" class="form-control" id="tracking_code" name="tracking_code" value="<?= (!empty($tracking_code)) ? $tracking_code : ''; ?>" placeholder="<?= $Lang->get("TRACKING_CODE_INPUT_PLACEHOLDER"); ?>" minlength="40" maxlength="40" required>
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <input type="checkbox" id="tracking_admin" name="tracking_admin" <?= ($tracking_admin) ? 'checked' : ''; ?>>
                                    <label><?= $Lang->get("TRACKING_ADMIN_TITLE"); ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>">
                                <button type="submit" class="btn btn-primary"><?= $Lang->get("TRACKING_CODE_REGISTER"); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div>
</section>