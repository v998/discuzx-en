/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: home_blog.js 15155 2010-08-19 08:16:19Z monkey $
	Modified by Valery Votintsev, codersclub.org
*/

function validate_ajax(obj) {
	var subject = $('subject');
	if (subject) {
		var slen = strlen(subject.value);
		if (slen < 1 || slen > 80) {
/*vot*/			alert(lng['title_length_invalid']);
			subject.focus();
			return false;
		}
	}
	if($('seccode')) {
		var code = $('seccode').value;
		var x = new Ajax();
		x.get('cp.php?ac=common&op=seccode&code=' + code, function(s){
			s = trim(s);
			if(s.indexOf('succeed') == -1) {
				alert(s);
				$('seccode').focus();
		   		return false;
			} else {
				edit_save();
				obj.form.submit();
				return true;
			}
		});
	} else {
		edit_save();
		obj.form.submit();
		return true;
	}
}

function edit_album_show(id) {
	var obj = $('uchome-edit-'+id);
	if(id == 'album') {
		$('uchome-edit-pic').style.display = 'none';
	}
	if(id == 'pic') {
		$('uchome-edit-album').style.display = 'none';
	}
	if(obj.style.display == '') {
		obj.style.display = 'none';
	} else {
		obj.style.display = '';
	}
}