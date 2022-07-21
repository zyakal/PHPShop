<?php
function getRandomFileNm($fileName) {
    return gen_uuid_v4() . "." . getExt($fileName);
}

function getExt($fileName) {
    return pathinfo($fileName, PATHINFO_EXTENSION);
}

function gen_uuid_v4() { 
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x'
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0x0fff) | 0x4000
        , mt_rand(0, 0x3fff) | 0x8000
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0xffff) 
    ); 
}
function rmdirAll($dir) {
    if(!is_dir($dir)) { return; }
    $dirs = dir($dir);
    while(false !== ($entry = $dirs->read())) {
        if(($entry != '.') && ($entry != '..')) {
            if(is_dir($dir.'/'.$entry)) {
                rmdirAll($dir.'/'.$entry);
            } else {
                    @unlink($dir.'/'.$entry);
            }
        }
    }
        $dirs->close();
        @rmdir($dir);
}

/* 선생님 방법
function rmdirAll($delete_path) {
    if(!is_dir($delete_path)) { return; }

	$dirs = dir($delete_path);

	while(false !== ($entry = $dirs->read())) {		
		if(($entry != '.') && ($entry != '..')) {			
			if(is_dir($delete_path . '/' . $entry)) {				
				rmdirAll($delete_path . '/' . $entry);
			} else {				
				@unlink($delete_path . '/' . $entry);
			}
		}
	}
	$dirs->close();	
	@rmdir($delete_path);
}
 */