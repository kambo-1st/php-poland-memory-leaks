<?php

function iAlsoLeakMemory() {
    eval('return function() {};');
}

while (true) {
    iAlsoLeakMemory();
    var_dump(memory_get_usage());
}
