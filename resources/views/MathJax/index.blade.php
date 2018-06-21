<!DOCTYPE html>
<html>
    <head>
        <title>Dynamic Preview of Textarea with MathJax Content</title>
        <!-- Copyright (c) 2012-2018 The MathJax Consortium -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body>

        <p> Type text (mixed with MathML, TeX or asciimath) in the box below for a live preview.</p>

        <textarea id="MathInput" cols="60" rows="10" onkeyup="Preview.Update()" style="margin-top:5px">
        </textarea>
        <p>Configured delimiters: 
            <ul>
                <li>TeX, inline mode: <code>\(...\)</code> or <code>$...$</code></li>
                <li>TeX, display mode: <code>\[...\]</code> or <code> $$...$$</code></li>
                <li>Asciimath: <code>`...`</code>.</li>
            </ul>
        </p>
        <p>
            When \(a \ne 0\), there are two solutions to \(ax^2 + bx + c = 0\) and they are
    \(x = {-b \pm \sqrt{b^2-4ac} \over 2a}\)
        </p>
        <p>Preview is shown here:</p>
        <div id="MathPreview" style="border:1px solid; padding: 3px; width:50%; margin-top:5px"></div>
        <div id="MathBuffer" style="border:1px solid; padding: 3px; width:50%; margin-top:5px;visibility:hidden; position:absolute; top:0; left: 0"></div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script type="text/x-mathjax-config">
            MathJax.Hub.Config({
                showProcessingMessages: false,
                tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] }
            });
        </script>
        <!-- <script type="text/javascript" async
        src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-MML-AM_CHTML" async> -->
        <script type="text/javascript" async src="{{asset('lib/MathJax-master/MathJax.js')}}?config=TeX-MML-AM_HTMLorMML"></script>
        {{--
        <script>
            var Preview = {
                delay: 150,        // delay after keystroke before updating
                preview: null,     // filled in by Init below
                buffer: null,      // filled in by Init below
                timeout: null,     // store setTimout id
                mjRunning: false,  // true when MathJax is processing
                mjPending: false,  // true when a typeset has been queued
                oldText: null,     // used to check if an update is needed
                //
                //  Get the preview and buffer DIV's
                //
                Init: function () {
                    this.preview = document.getElementById("MathPreview");
                    this.buffer = document.getElementById("MathBuffer");
                },
                //
                //  Switch the buffer and preview, and display the right one.
                //  (We use visibility:hidden rather than display:none since
                //  the results of running MathJax are more accurate that way.)
                //
                SwapBuffers: function () {
                    var buffer = this.preview, preview = this.buffer;
                    this.buffer = buffer; this.preview = preview;
                    buffer.style.visibility = "hidden"; buffer.style.position = "absolute";
                    preview.style.position = ""; preview.style.visibility = "";
                },
                //
                //  This gets called when a key is pressed in the textarea.
                //  We check if there is already a pending update and clear it if so.
                //  Then set up an update to occur after a small delay (so if more keys
                //    are pressed, the update won't occur until after there has been 
                //    a pause in the typing).
                //  The callback function is set up below, after the Preview object is set up.
                //
                Update: function () {
                    if (this.timeout) {clearTimeout(this.timeout)}
                    this.timeout = setTimeout(this.callback,this.delay);
                },
                //
                //  Creates the preview and runs MathJax on it.
                //  If MathJax is already trying to render the code, return
                //  If the text hasn't changed, return
                //  Otherwise, indicate that MathJax is running, and start the
                //    typesetting.  After it is done, call PreviewDone.
                //  
                CreatePreview: function () {
                    Preview.timeout = null;
                    if (this.mjPending) return;
                    var text = document.getElementById("MathInput").value;
                    if (text === this.oldtext) return;
                    if (this.mjRunning) {
                    this.mjPending = true;
                    MathJax.Hub.Queue(["CreatePreview",this]);
                    } else {
                    this.buffer.innerHTML = this.oldtext = text;
                    this.mjRunning = true;
                    MathJax.Hub.Queue(
                    ["Typeset",MathJax.Hub,this.buffer],
                    ["PreviewDone",this]
                    );
                    }
                },
                //
                //  Indicate that MathJax is no longer running,
                //  and swap the buffers to show the results.
                //
                PreviewDone: function () {
                    this.mjRunning = this.mjPending = false;
                    this.SwapBuffers();
                }
            };
            //
            //  Cache a callback to the CreatePreview action
            //
            Preview.callback = MathJax.Callback(["CreatePreview",Preview]);
            Preview.callback.autoReset = true;  // make sure it can run more than once
        </script>
        <script>
            Preview.Init();
        </script> --}}
    </body>
</html>