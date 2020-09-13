<section class="nav-page" pageVTourUrl="guide/tour/form-tour.html" pageVGuideUrl="guide/form-guide.html">
    <div class="container">
        <div class="row">
            <div class="span7">
                <header class="page-header">
                    <h3>เพิ่มสินค้าเป็นชุด</h3>
                </header>
            </div>

        </div>
    </div>
</section>
<style>
    * {
        font-family: segoe, sans-serif;
    }

    #wrapper {
        width:100%;
        margin:0 auto;
        margin-top:10px;
    }
    #fileDropBox {
        margin-left:10px;
        width: 30em;
        line-height: 20em;
        border: 1px dashed gray;
        text-align: center;
        color: gray;
        border-radius: 7px;
    }
</style>
<script>
    var message = [];
    if (!window.FileReader) {
        message = '<p>The ' +
                '<a href="http://dev.w3.org/2006/webapi/FileAPI/"        target="_blank">File API</a>s ' +
                'are not fully supported by this browser.</p>' +
                '<p>Upgrade your browser to the latest version.</p>';
        document.querySelector('body').innerHTML = message;
    } else {
        // Set up the file drag and drop listeners:
        document.getElementById('fileDropBox').addEventListener('dragover', handleDragOver, false);
        document.getElementById('fileDropBox').addEventListener('drop', handleFileSelection, false);
    }

    function sanitizeHTML(htmlString) {
        var tmp = document.createElement('div');
        tmp.appendChild(document.createTextNode(htmlString));
        return tmp.innerHTML;
    } // stripHtmlFromText

    function handleDragOver(evt) {
        evt.stopPropagation(); // Do not allow the dragover event to bubble.
        evt.preventDefault(); // Prevent default dragover event behavior.
    } // handleDragOver

    function displayFileText(evt) {
        var fileString = evt.target.result; // Obtain the file contents, which was read into memory.
        //evt.target is a FileReader object, not a File object; so window.URL.createObject(evt.target) won't work here!
        alert(sanitizeHTML(fileString), {
            width: 40,
            tile: true
        }); // sanitizeHTML() is used in case the user selects one or more HTML or HTML-like files
    } // displayFileText

    function handleFileReadAbort(evt) {
        alert("File read aborted.");
    } // handleFileReadAbort

    function handleFileReadError(evt) {
        var message;
        switch (evt.target.error.name) {
            case "NotFoundError":
                alert("The file could not be found at the time the read was processed.");
                break;
            case "SecurityError":
                message = "<p>A file security error occured. This can be due to:</p>";
                message += "<ul><li>Accessing certain files deemed unsafe for Web applications.</li>";
                message += "<li>Performing too many read calls on file resources.</li>";
                message += "<li>The file has changed on disk since the user selected it.</li></ul>";
                alert(message);
                break;
            case "NotReadableError":
                alert("The file cannot be read. This can occur if the file is open in another application.");
                break;
            case "EncodingError":
                alert("The length of the data URL for the file is too long.");
                break;
            default:
                alert("File error code " + evt.target.error.name);
        } // switch
    } // handleFileReadError

    function startFileRead(fileObject) {
        var reader = new FileReader();
        // Set up asynchronous handlers for file-read-success, file-read-abort, and file-read-errors:
        reader.onloadend = displayFileText; // "onloadend" fires when the file contents have been successfully loaded into memory.
        reader.abort = handleFileReadAbort; // "abort" files on abort.
        reader.onerror = handleFileReadError; // "onerror" fires if something goes awry.

        if (fileObject) { // Safety first.
            reader.readAsText(fileObject); // Asynchronously start a file read thread. Other supported read methods include readAsArrayBuffer() and readAsDataURL().
        }
    } // startFileRead

    function handleFileSelection(evt) {
        evt.stopPropagation(); // Do not allow the drop event to bubble.
        evt.preventDefault(); // Prevent default drop event behavior.

        var files = evt.dataTransfer.files; // Grab the list of files dragged to the drop box.

        if (!files) {
            alert("<p>At least one selected file is invalid - do not select any folders.</p><p>Please reselect and try again.</p>");
            return;
        }

        // "files" is a FileList of file objects. Try to display the contents of each file:
        for (var i = 0, file; file = files[i]; i++) {
            if (!file) {
                alert("Unable to access " + file.name);
                continue; // Immediately move to the next file object.
            }
            if (file.size == 0) {
                alert("Skipping " + file.name.toUpperCase() + " because it is empty.");
                continue;
            }
            if (!file.type.match('text/.*')) {
                alert("Skipping " + file.name.toUpperCase() + " because it is not a known text file type.");
                continue;
            }
            startFileRead(file); // Asychronously fire off a file read request.
        } // for
    } // handleFileSelection
</script>
<div id="Person-5" class="box well well-shadow">
    <div class="row">
        <div class="span9">
            <div class="row">
                <div class="span3">
                    <div id="wrapper">
                    <?php echo $this->session->userdata('message'); ?>
                    <form role="form" action="<?php echo base_url('import/importCSV') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputFile">File input <font color="red">.CSV Only</font></label>
                        <input type="file" name="file" id="exampleInputFile">
                        <p class="help-block">นำเข้าข้อมูลจากไฟล์ .csv</p>
                        <hr />
                        <label><b>ยืนยันการนำข้อมูลเข้าระบบ</b> <input id="chk-student" type="checkbox"></label><br/>
                        <div id="details">
                            <button type="submit" id="loading-example-btn" data-loading-text="Loading..." class="btn btn-primary">
                                <i class="fa fa-plus"></i> นำเข้าข้อมูลเดียวนี้
                            </button>
                        </div>
                    </div>
                </form>
                <script>
                    $(document).ready(function () {
                        //disable on page load
                        $('#details :input').attr('disabled', true);

                        $('#chk-student').change(function () {
                            $('#details :input').attr('disabled', !this.checked);
                        })
                    });
                </script>
                    </div>
                </div>

            </div>
            
        </div>
        <div style="margin-left: 20px">
                <table border="2" style="width:100%">                
                <tr>
                <th>No</th>
                <th>ItemCode</th>
                <th>ชื่อการค้า</th>                
                <th>Barcode</th>
                <th>กลุ่มยาหลัก</th>
                <th>กลุ่มยาย่อย</th>
                <th>Preg Cat</th>
                <th>ราคาทุน</th>
                <th>ราคาขาย</th>
                <th>จำนวน</th>
                <th>หน่วย</th>
                <th>ชื่อสามัญ</th>
                <th>ข้อบ่งใช้</th>
                <th>ครั้งละ</th>
                <th>กี่เม็ด</th>
                <th>ความถี่</th>
                <th>มื้ออาหาร</th>
                <th>ข้อแนะนำ</th>
                <th>รหัสคลินิก</th>
                </tr>
                
                </table>


                </div>
    </div>
</div>
