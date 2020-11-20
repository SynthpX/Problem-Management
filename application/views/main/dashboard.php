<style>
    #content {
        top: 4.5em;
        padding-bottom: 8em;
    }
    .parentmiddle{
        display: table;
        width: 100%;
        height: 100%;
    }
    #middle{
        display: table-cell;
        text-align: center;
        vertical-align: middle;
    }
    #redly{
        background-color: #e53935;
    }
    #teally{
        background-color: #009688;
    }
    #bluely{
        background-color: #1976d2;
    }
    #yellowly{
        background-color: #ffb300;
    }
    #yellowly, #bluely, #teally, #redly{
        color: #EDF1F5;
    }
    .colorly{
        padding: 20px;
    }
    .labelfull{
        width: 100%;
        text-align: center;
    }
</style>
<div class="mainWrap" style="padding-top: 40px;">
    <div class="ui equal width left aligned padded grid stackable">
        <div class="row">
            <div class="fifteen wide centered column">
                <div class="ui grid">
                    <div class="row">
                        <div class="sixteen wide computer column">
                            <p><h1>DASHBOARD</h1></p>
                            <div class="ui divider"></div>
                            <br>
                        </div>
                        <!-- BEGIN DATA 1 -->
                        <div class="four wide computer sixteen wide phone column justified">
                            <div class="ui segment">
                                <div class="ui link items data1">
                                    <div class="item">
                                        <div class="ui tiny image" id="redly">
                                            <div class="parentmiddle" id="parentcolor1">
                                                <i class="huge database icon" id="middle"></i>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="header">INCIDENT LOG</div>
                                            <div class="meta">
                                                <span class="cinema"><strong><?php echo $incident; ?> DATA</strong></span>
                                            </div>
                                            <div class="extra">
                                                <a class="ui label labelfull" href="<?php echo base_url('/manage/incident'); ?>"><i class="eye icon"></i> Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END DATA 1 -->
                        <!-- BEGIN DATA 2 -->
                        <div class="four wide computer sixteen wide phone column justified">
                            <div class="ui segment">
                                <div class="ui link items data2">
                                    <div class="item">
                                        <div class="ui tiny image" id="teally">
                                            <div class="parentmiddle" id="parentcolor2">
                                                <i class="huge database icon" id="middle"></i>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="header">PROBLEM LOG</div>
                                            <div class="meta">
                                                <span class="cinema"><?php echo $Problem_log; ?> DATA</span>
                                            </div>
                                            <div class="extra">
                                                <a class="ui label labelfull" href="<?php echo base_url('/manage/problem_log'); ?>"><i class="eye icon"></i> Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END DATA 2 -->
                        <!-- BEGIN DATA 3 -->
                        <div class="four wide computer  sixteen wide phone column justified">
                            <div class="ui segment">
                                <div class="ui link items data4">
                                    <div class="item">
                                        <div class="ui tiny image" id="yellowly">
                                            <div class="parentmiddle" id="parentcolor4">
                                                <i class="huge database icon" id="middle"></i>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="header">PROBLEM REG</div>
                                            <div class="meta">
                                                <span class="cinema"><?php echo $Problem_reg; ?> DATA</span>
                                            </div>
                                            <div class="extra">
                                                <a class="ui label labelfull" href="<?php echo base_url('/manage/problem_reg'); ?>"><i class="eye icon"></i> Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END DATA 3 -->
                        <!-- BEGIN DATA 4 -->
                        <div class="four wide computer sixteen wide phone column justified">
                            <div class="ui segment">
                                <div class="ui link items data3">
                                    <div class="item">
                                        <div class="ui tiny image" id="bluely">
                                            <div class="parentmiddle" id="parentcolor3">
                                                <i class="huge database icon" id="middle"></i>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="header">KNOWN ERROR</div>
                                            <div class="meta">
                                                <span class="cinema"><?php echo $known_error; ?> DATA</span>
                                            </div>
                                            <div class="extra">
                                                <a class="ui label labelfull" href="<?php echo base_url('/manage/known_error'); ?>"><i class="eye icon"></i> Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END DATA 4 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>