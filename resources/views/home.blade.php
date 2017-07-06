@extends('master_main')

@section('cont')
    
@if(Session::has('message'))
    {{Session::get('message')}}
@endif

    <div class="row">
        <div class="col-xs-3 left-box">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><span class="fa fa-clock-o"></span>Recents</a></li>
                <li><a href="#"><span class="fa fa-file-text-o"></span>Files</a></li>
                <li><a href="#"><span class="fa fa-camera"></span>Photos</a></li>
                <li><a href="#"><span class="fa fa-share-alt"></span>Sharing</a></li>
                <li><a href="#"><span class="fa fa-link"></span>Links</a></li>
                <li><a href="#"><span class="fa fa-calendar"></span>Events</a></li>
                <li><a href="#"><span class="fa fa-plus-circle"></span>File requests</a></li>
                <li><a href="#"><span class="fa fa-trash-o"></span>Deleted files</a></li>
            </ul>
        </div>
      <div class="col-xs-9" style="margin-top:60px;">
         <div class="row">
                    <div class="col-xs-4">
                        <h1 class="page-title">Files</h1>
                    </div>
                    <div class="col-xs-8 text-right">
                        <form action="#" class="pull-right">
                            <div class="right-inner-addon">
                                <input type="search" class="form-control" placeholder="Search" />
                                <span class="fa fa-search"></span>
                            </div>
                        </form>
                        <ul class="list-inline pull-right files-tool-box">
                            <li>
                                <a href="#" data-toggle="tooltip" title="Upload"><span class="fa fa-upload"></span></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="New folder"><span class="fa fa-folder-o"></span></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="Share a folder..."><span class="fa fa-share-alt-square"></span></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="Show deleted files"><span class="fa fa-trash-o"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="files-box">
                    <div class="file-tools-box row">
                        <div class="col-xs-2">
                            <span class="text-nowrap">File Name.doc</span>
                        </div>
                        <div class="col-xs-8">
                            <ul class="list-inline">
                                <li><a href=""><span class="fa fa-download"></span> Download</a>
                                <li><a href=""><span class="fa fa-comments"></span> Comment</a></li>
                                <li><a href=""><span class="fa fa-trash-o"></span> Delete</a></li>
                                <li><a href=""><span class="fa fa-edit"></span> Rename</a></li>
                                <li>
                                    <a class="dropdown" data-toggle="dropdown" href="">More <span class="fa fa-caret-down"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><span class="fa fa-mail-forward"></span> Move</a></li>
                                            <li><a href="#"><span class="fa fa-copy"></span> Copy</a></li>
                                            <li><a href="#"><span class="fa fa-history"></span> Previous versions</a></li>
                                        </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-2 text-right">
                            <span class="text-nowrap">46 KB</span>
                        </div>
                    </div>
                    <div class="row files-list-header">
                        <div class="col-xs-5">Name<span class="fa fa-caret-up"></span></div>
                        <div class="col-xs-3">Modified</div>
                        <div class="col-xs-4">Share with</div>
                    </div>
                    <div class="row file-row">
                        <div class="col-xs-5"><a href="#">File Name.doc</a></div>
                        <div class="col-xs-3">9/03/2016 14:29</div>
                        <div class="col-xs-4">
                            <a href="#" class="btn btn-default btn-xs pull-right">Share</a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="People with the link can view"><span class="fa fa-link"></span></a>
                        </div>
                    </div>
                   
                    <div class="row file-row">
                        <div class="col-xs-5"><a href="#">File Name.doc</a></div>
                        <div class="col-xs-3">9/03/2016 14:29</div>
                        <div class="col-xs-4">
                            <a href="#" class="btn btn-default btn-xs pull-right">Share</a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="People with the link can view"><span class="fa fa-link"></span></a>
                        </div>
                    </div>
                
                </div>
      </div>
    </div>

<script type="text/javascript">
        <!-- КОД ДЛЯ ДЕМОНСТРАЦИИ ПРИНЦИПА РАБОТЫ-->
        $(document).ready(function() {
            $('.file-row').click(function(){
                $('.file-tools-box').show();
            });
            $(function($){
                $(document).mouseup(function (e){ 
                    var div = $(".file-tools-box");
                    if (!div.is(e.target) && div.has(e.target).length === 0) {
                        div.hide();
                    }
                });
            });
        });
</script>

@endsection
