<?php

/**
 * Split array into chunks of a given size.
 *
 * @param array $data The array to split.
 * @param int $size The size of each chunk.
 * @return array The array of chunks.
 */
function chunkTechnicalData($data, $size = 12) {
    return array_chunk($data, $size);
}