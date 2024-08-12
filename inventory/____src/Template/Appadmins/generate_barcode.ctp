
<style>
    .btn.active, .btn:active {
        background: #db8031 !important;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Generate Barcode </h1>        
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">

                        <?= $this->Form->create(@$user, array('id' => 'profile_data', 'data-toggle' => "validator", 'type' => 'file')) ?>


                        <div class="form-group">
                            <label for="email">Barcode value:</label>
                            <input type="text" name="bar_code" class="form-control" id="bar_code">
                        </div>
                        <div class="form-group">
                            
                            <input type="submit" class="btn btn-info" id="Submir" value="Generate">
                        </div>


                        <?= $this->Form->end() ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
