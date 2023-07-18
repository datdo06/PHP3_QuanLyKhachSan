<?php
// Xây dựng những hàm đóng vai trò là system
// Xây dưng hàm upload file
function uploadFile($nameFolder, $file) {
    $fileName = time().'_'.$file->getClientOriginalName();

    return $file->storeAs($nameFolder, $fileName, 'public');
}
