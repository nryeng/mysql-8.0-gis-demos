# Tiles Cache

This directory is where tiles.php will put its tile cache. It must be
readable and writable by the web user. E.g.:

```
chmod a+rwx offline/tiles
chmod a+rwx offline/tiles/mapnik
```

When it works, the tile cache will fill up the directory with
PNGs. Just surf around on the map to fill the cache for later offline
use.

Note: The script will display the tiles even if they can't be cached,
so check that the PNGs are really there before going offline.
