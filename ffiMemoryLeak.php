<?php

function iWillLeakMemory() {
    $a = FFI::new("long[1024]", false, true);
}

while (true) {
    iWillLeakMemory();
    var_dump(memory_get_usage());
}
