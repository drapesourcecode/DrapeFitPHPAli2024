<div class="content-wrapper">
    <div class="container">
        <?= $this->Flash->render() ?>  
        <?php if (!empty($stamps_label_details) && !empty($stamps_label_details->ship_tracking_number)) { ?>
            <div class="row">
                <div class="col-sm-4">
                    <a href="<?=$stamps_label_details->ship_label_url;?>" class="btn btn-success">PRINT SHIPPING LABEL</a>
                </div>
                <div class="col-sm-4">
                    <a href="<?=$stamps_label_details->return_label_url;?>" class="btn btn-success">PRINT RETURN LABEL</a>
                </div>
            </div>
        <?php } else { ?>
        <div class="loading">Loading&#8230;</div>

        <div class="content" style="text-align: center;"><h3>Processing info...</h3></div>

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">

                    <div id="hero">

                        <!--<h1>Click <span><a href="https://signin.testing.stampsendicia.com/authorize?client_id=<?=$get_token["client_id"];?>&response_type=code&redirect_uri=<?=$get_token["redirect_uri"];?>&scope=offline_access" >here</a></span> to redict stamp code page</h1>-->

                        <p>
                            <!--<strong>Put Generated code here</strong> -->

                            <br/><br/>
                            <?= $this->Form->create('', ['type' => 'POST','id'=>'stamp_auth_frm']); ?>
                        <!--<div class="form-group">-->
                        <!--    <label for="name">Code</label>-->
                        <!--    <input type="text" id="code" name="code" placeholder="code" value="<?= !empty($_GET['code'])?$_GET['code']:'';?>" required <?php if(!empty($_GET['code'])){ ?> readonly <?php } ?>>-->
                        <!--</div>-->
                    <?php //if(!empty($_GET['code'])){ ?>
                        <script>
                        $(document).ready(function(){
                            $('#stamp_auth_frm').submit();
                        })
                        </script>
                    <?php //}else{ ?>
                        <!--<button type="submit" class="btn btn-success">Submit</button>-->
                    <?php //} ?>
                        <!--<button type="submit" class="btn btn-success">Submit</button>-->
                        <?= $this->Form->end(); ?>

                        </p>
                    </div>
                </div>
            </div>
            
            <style>
                /* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
            </style>
        <?php } ?>
    </div>
</div>
