<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="public/img/brand.svg">

<title>Cnet2ADweb</title>
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<link rel="stylesheet" href="public/css/checkbox.css">

<style>

#diagram {
    margin: 0;
    border: 0;
    padding: 0;
    width: 100%;
    height: 400px;
}
    
#progress-wrp {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    height: 30px;
    width: 100%;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
}
#progress-wrp .progress-bar{
    height: 100%;
    border-radius: 3px;
    background-color: greenyellow;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
}
#progress-wrp .status{
    top:3px;
    left:50%;
    position:absolute;
    display:inline-block;
    color: #000000;
}



</style>

</head>
<body>

<nav class="navbar navbar-light bg-faded" style="background-color: whitesmoke;">
    <a class="navbar-brand" href="#">
        <img src="public/img/brand.svg" width="32" height="32" alt="">
        Cnet2ADweb
    </a>
</nav>

<div class = 'container'>

    <div class = 'row justify-content-center'>
        <div class = 'col-8 col-sm-8'>

            <div class = 'alert alert-info mt-4'>

                <form id = 'upload_form' method = 'POST' action = 'log' class = 'form-inline'>
                    <div class = 'content' id = 'section_uploading'>
                        <div class = 'form-group'>
                            <input name = 'file' type = "file" accept=".mxml,.xes" id = 'log_upload' />
                        </div>
                    </div>
                     <div id="progress-wrp" class="content">
                                <div class="progress-bar"></div>
                                    <div class="status">0%</div>
                    </div>
                </form>

            </div>
            <a href='#' id='btn_settings' class = 'btn btn-info btn-sm invisible'>Settings</a>
            <a href='#' id='btn_annotate' class = 'btn btn-info btn-sm invisible'>Layers</a>

        </div>
    </div>

    <div id = 'settings' style='display:none'>
        <div class = 'row justify-content-center pt-3'>
            <div class = 'col-8 col-sm-8'>

                <form id = 'settings_form' method = 'POST' action = '#' class = 'form'>
                    <div class="form-group">
                        <label>Sigma Log Noise</label>
                        <input id='sigma' type="number" class="form-control" name='sigma' step="0.1" min="0" max="1" value='0.05'>
                    </div>
                    <div class="form-group">
                        <label>Fall Factor</label>
                        <input id='ff' type="number" class="form-control" name='ff' step="0.1" min="0" max="1" value='0.9'>
                    </div>
                    <div class="form-group">
                        <label>Relative to best</label>
                        <input id='rtb' type="number" class="form-control" name='rtb' step="0.1" min="0" max="1" value='0.75'>

                    </div>
                </form>

            </div>
        </div>

        <div class = 'row justify-content-center'>
            <div class = 'col-8 col-sm-8'>

                <div class = 'alert alert-warning'>
                    <label>Constraints</label>
                    <form id = 'constraints_form' method = 'POST' action = 'constraints' class = 'form-inline'>
                        <div class = 'content' id = 'section_uploading'>
                            <div class = 'form-group'>
                                <input name='file' type="file" accept=".xml" id='constraints_upload' />
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    <div class = 'row justify-content-center'>
            <div class = 'col-8 col-sm-8'>
                <div class = 'alert alert-warning'>
                 <label>Context Ontology - Mandatory for Abstraction Level 3 and above</label>
                    <form id = 'ontology_form' method = 'POST' action = 'ontology' class = 'form-inline'>
                        <div class = 'content' id = 'section_uploading'>
                            <div class = 'form-group'>
                                <input name='file' type="file" accept=".owl" id='ontology_upload' />
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div id = 'annotate' style='display:none'>
        <div class = 'row justify-content-center pt-3'>
            <div class = 'col-8 col-sm-8'>
                <h5>Abstraction Level</h5>
				
            <div class="funkyradio">
                <div class="funkyradio-primary">
                    <input type="radio" name="radio" id="radio1" value="1" checked/>
                    <label for="radio1">Level 1 - Activity</label>
                </div>
                <div class="funkyradio-primary">
                    <input type="radio" name="radio" id="radio2" value="2" />
                    <label for="radio2">Level 2 - Activity | Resource</label>
                </div>
                <div class="funkyradio-primary">
                    <input type="radio" name="radio" id="radio3" value="3" />
                    <label for="radio3">Level 3 - Activity(Role , Resource)</label>
                </div>
                <div class="funkyradio-primary">
                    <input type="radio" name="radio" id="radio4" value="4" />
                    <label for="radio4">Level 4 - Not implemented</label>
                </div>
            </div> 
		<!--	<style>   -->
#slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}
</style>
<body>

<h1>Custom Range Slider</h1>
<p>Drag the slider to display the current value.</p>

<div id="slidecontainer">
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
  <p>Value: <span id="demo"></span></p>
</div>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

			
			
			
			
			</div>
         </div>
    </div>



    <div class = 'row justify-content-center pt-3'>
        <div class = 'col-8 col-sm-8'>
            <button id = 'btn_process' class = 'btn btn-success invisible'>Process</button>
            <a id = 'btn_download' class = 'btn btn-danger invisible' href='#'>Download XMI</a>
            <a id = 'btn_ontology' class = 'btn btn-danger invisible' href='#'>Download Ontology</a>
            <a id = 'btn_webvowl' target = '_blank' class = 'btn btn-danger invisible' href='http://visualdataweb.de/webvowl/'>Visualize Ontology</a>
            <a id = 'btn_visualize' class = 'btn btn-danger invisible' href='#'>Show Graph</a>
        </div>
    </div>

    <div class = 'row justify-content-center pt-3'>
        <div class = 'col-12 col-sm-12'>
            <div id = 'diagram' style = 'display:none'></div>
        </div>
    </div>

</div>

<script src='public/js/jquery-3.2.1.min.js'></script>
<script src='public/js/tether.min.js'></script>
<script src='public/js/bootstrap.min.js'></script>

<script src='public/js/go.js'></script>
<script src='public/js/cnet2ad.js'></script>
<script src='public/js/cnet2ad.graphics.js'></script>
<script src='public/js/Upload.js'></script>    

<script>

var btn_process = document.getElementById('btn_process');
var btn_download = document.getElementById('btn_download');
var btn_webvowl = document.getElementById('btn_webvowl');
var btn_visualize = document.getElementById( 'btn_visualize' );
var btn_ontology = document.getElementById('btn_ontology');
var btn_settings = document.getElementById('btn_settings');
var btn_annotate = document.getElementById('btn_annotate');

var logFilename = null;
var constraintsFilename = null, businessOntology=null;

if( btn_process != null )
    btn_process.onclick = process;

if( btn_visualize != null )
    btn_visualize.onclick = visualize;

if( btn_settings != null )
    btn_settings.onclick = function(){
        $('#settings').toggle('slow');
    }

if( btn_annotate != null )
    btn_annotate.onclick = function(){
        $('#annotate').toggle('slow');
    }

/*
    Esegui l'upload del file di log
*/
document.getElementById('log_upload').onchange = function(e){
    // Resetta tutto
    if( btn_download.className.includes("invisible") == false )
        btn_download.className += ' invisible';
    if( btn_visualize.className.includes("invisible") == false )
        btn_visualize.className += ' invisible';
    if( btn_ontology.className.includes("invisible") == false )
        btn_ontology.className += ' invisible';
    if( btn_webvowl.className.includes("invisible") == false )
        btn_webvowl.className += ' invisible';
    if( btn_annotate.className.includes("invisible") == false )
        btn_annotate.className += ' invisible';
    if( btn_settings.className.includes("invisible") == false )
        btn_settings.className += ' invisible';

    logFilename = constraintsFilename = null;
    $('#diagram').hide();
    //Retrieve the first (and only!) File from the FileList object
   // var file = e.target.files[0];
   /* if (file) {
        var data = new FormData();
        data.append( 'file', file, file.name );
        $.ajax( {
            url: 'log',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            'success': function(e){

                if( e == "UPLOAD:ERROR" ){
                    alert("Upload fallito!");
                    if( btn_process.className.includes("invisible") == false )
                        btn_process.className += ' invisible';
                    return;
                }

                console.log( "Upload riuscito!");
                btn_process.className = btn_process.className.replace('invisible', '');
                logFilename = e;

            }
        } );        
    } */

   // var file = e.target.files[0];
      var file = $(this)[0].files[0];
    var upload = new Upload(file);

    // maby check size or type here with upload.getSize() and upload.getType()
    if (upload.getSize()>2000000)
        alert("Dimensione massima consentita 2MB")
    else
        // execute upload
        upload.doUpload(e);

}

document.getElementById('constraints_upload').onchange = function(e){
    //Retrieve the first (and only!) File from the FileList object
    var file = e.target.files[0];
    if (file) {
        var data = new FormData();
        data.append( 'constraints', file, file.name );
        $.ajax( {
            url: 'constraints' + '/' + logFilename,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            'success': function(e){

                if( e.indexOf("UPLOAD:ERROR")!=-1 ){
                    alert("Upload del file di vincoli fallito!");
                    return;
                }

                console.log( "Upload del file di vincoli riuscito!");
                constraintsFilename = e;

            }
        } );
    }
}
document.getElementById('ontology_upload').onchange = function(e){
    //Retrieve the first (and only!) File from the FileList object
    var file = e.target.files[0];
    if (file) {
        var data = new FormData();
        data.append( 'ontology', file, file.name );
        $.ajax( {
            url: 'ontology' + '/' + logFilename,
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            'success': function(e){

                if( e.indexOf("UPLOAD:ERROR")!=-1 ){
                    alert("Upload dell'ontologia fallito!");
                    return;
                }

                console.log( "Upload dell'ontologia riuscito!");
                businessOntology = e;

            }
        } );
    }
}

function process(){

     // Resetta tutto
    if( btn_download.className.includes("invisible") == false )
        btn_download.className += ' invisible';
    if( btn_visualize.className.includes("invisible") == false )
        btn_visualize.className += ' invisible';
    if( btn_ontology.className.includes("invisible") == false )
        btn_ontology.className += ' invisible';
    if( btn_webvowl.className.includes("invisible") == false )
        btn_webvowl.className += ' invisible';
    var cont ={ 
                sigma: (document.getElementById('sigma').value),
                ff: (document.getElementById('ff').value),
                rtb: (document.getElementById('rtb').value),
                constraints: constraintsFilename,
                level: $('input[name="radio"]:checked').val()
            };
    var intLevel=Number(cont.level);
    var equals=businessOntology !=logFilename+".business";
    if (Number(cont.level)>2 && businessOntology !=logFilename+".business")
        return  alert(" You selected abstraction Level " + cont.level + ". Context ontology needed.");
    
    $.post( 'process/' + logFilename, cont)
        .done(function( e ) {

            if(e == "Cnet2ADRESULT:ERROR")
            {
                alert("Cnet2AD fallito!");
                if( btn_download.className.includes("invisible") == false )
                    btn_download.className += ' invisible';
                if( btn_visualize.className.includes("invisible") == false )
                    btn_visualize.className += ' invisible';
                if( btn_ontology.className.includes("invisible") == false )
                    btn_ontology.className += ' invisible';
                if( btn_webvowl.className.includes("invisible") == false )
                    btn_webvowl.className += ' invisible';
                return;
            }

            btn_download.className = btn_download.className.replace('invisible', '');
            btn_ontology.className = btn_ontology.className.replace('invisible', '');
            btn_visualize.className = btn_visualize.className.replace('invisible', '');
            btn_webvowl.className = btn_webvowl.className.replace('invisible', '');

            xmi = e;

            btn_download.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent( xmi ));
            btn_download.setAttribute('download', 'Cnet2AD.xmi');

            btn_ontology.href = "bin/" + logFilename + ".owl";
            btn_ontology.setAttribute('download', 'SemanticCnet2AD.out.owl');

        }
    );

}

function visualize(){
    $.ajax( {
        url: 'visualize/' + logFilename,
        type: 'GET',
        data: null,
        processData: false,
        contentType: false,
        'success': function(e){

            if(e == "Visualize:ERROR")
            {
                alert("Cannot visualize the graph!");
                return;
            }

            var data = eval("[" + e + "]");

            Cnet2AD.show(data[0], data[1]);
            $('#diagram').show();

        }
    } );
}
            
Cnet2AD.init('diagram');

</script>

</body>
</html>
