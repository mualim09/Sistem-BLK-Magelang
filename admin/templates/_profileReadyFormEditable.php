<div class="editor-panel">
  <div class="header-editor">
  <div class="btn-group" role="group" aria-label="...">
    <button class="btn btn-default btn-sm" onclick="execCmd('bold')"><i class="fa fa-bold"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('italic')"><i class="fa fa-italic"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('underline')"><i class="fa fa-underline"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('strikeThrough')"><i class="fa fa-strikethrough"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('justifyLeft')"><i class="fa fa-align-left"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('justifyCenter')"><i class="fa fa-align-center"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('justifyRight')"><i class="fa fa-align-right"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('cut')"><i class="fa fa-cut"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('copy')"><i class="fa fa-copy"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('indent')"><i class="fa fa-indent"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('outdent')"><i class="fa fa-dedent"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('subscript')"><i class="fa fa-subscript"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('superscript')"><i class="fa fa-superscript"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('undo')"><i class="fa fa-undo"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('redo')"><i class="fa fa-repeat"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('insertUnorderedList')"><i class="fa fa-list-ul"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('insertOrderedList')"><i class="fa fa-list-ol"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('insertParagraph')"><i class="fa fa-paragraph"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('insertHorizontalRule')">HR</button>
    <button class="btn btn-default btn-sm" onclick="execCommandWithArg('createLink', prompt('Enter URL', 'http://'))"><i class="fa fa-link"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('unlink')"><i class="fa fa-unlink"></i></button>
    <button class="btn btn-default btn-sm" onclick="toggleSource()"><i class="fa fa-code"></i></button>
    <button class="btn btn-default btn-sm" onclick="toggleEdit()">Toggle Edit</button>
    <button class="btn btn-default btn-sm" onclick="execCommandWithArg('insertImage', prompt('Enter Image URL :', ''))"><i class="fa fa-image"></i></button>
    <button class="btn btn-default btn-sm" onclick="execCmd('selectAll')">Select All</button>
    <select class="btn btn-default btn-sm" onchange="execCommandWithArg('formatBlock', this.value)">
      <option value="H1">H1</option>
      <option value="H2">H2</option>
      <option value="H3">H3</option>
      <option value="H4">H4</option>
      <option value="H5">H5</option>
      <option value="H6">H6</option>
    </select>
    <select class="btn btn-default btn-sm" onchange="execCommandWithArg('fontName', this.value)">
      <option value="Arial">Arial</option>
      <option value="Comic Sans MS">Comic Sans MS</option>
      <option value="Courier">Courier</option>
      <option value="Georgia">Georgia</option>
      <option value="Tahoma">Tahoma</option>
      <option value="Times New Roman">Times New Roman</option>
      <option value="Verdana">Verdana</option>
    </select>
    <select class="btn btn-default btn-sm" onchange="execCommandWithArg('fontSize', this.value)">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
    </select>
    <div class="input-group">
      <label class="input-group-addon"><i class="fa fa-font"></i></label>
      <input type="color" onchange="execCommandWithArg('foreColor', this.value)" class="form-control" style="width:50px;">
    </div>
    <div class="input-group">
      <label class="input-group-addon"><i class="fa fa-font" style="background-color:red;"></i></label>
      <input type="color" onchange="execCommandWithArg('hiliteColor', this.value)" class="form-control" style="width:50px;">
    </div>
    </div>
  </div>
    <form id="formEditor" action="" method="POST" class="form-horizontal" onsubmit="return false">
      <iframe id="profilDeskripsi" name="editor" frameborder="0" class="body-editor"></iframe><br>
      <input type="submit" onclick="editProfil()" value="Edit Profil" class="btn btn-info">
    </form>
</div>