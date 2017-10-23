CREATE SCHEMA IF NOT EXISTS demo;
USE demo;

DROP TABLE IF EXISTS sights;
CREATE TABLE sights (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pos POINT SRID 4326 NOT NULL,
  description VARCHAR(200),
  SPATIAL INDEX (pos)
);

INSERT INTO sights (pos, description) VALUES (
  ST_PointFromText('POINT(10.3958 63.4269)', 4326, 'axis-order=long-lat'),
  'Nidaros Cathedral'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromGeoJSON('{"type":"Point","coordinates":[10.4025,63.4194]}'),
  'Norwegian University of Science and Technology'
);

INSERT INTO sights (pos, description) VALUES (
  ST_PointFromText('POINT(63.4225 10.3948)', 4326),
  'Student Society Building'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.3951 63.4305)', 4326, 'axis-order=long-lat'),
  'Olav Tryggvason Monument'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.4017 63.4282)', 4326, 'axis-order=long-lat'),
  'Old Town Bridge'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.3830 63.4510)', 4326, 'axis-order=long-lat'),
  'Munkholmen'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.3930 63.4339)', 4326, 'axis-order=long-lat'),
  'Boat to Munkholmen'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.3960 63.4261)', 4326, 'axis-order=long-lat'),
  'Archbishop\'s Palace'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.3952 63.4261)', 4326, 'axis-order=long-lat'),
  'Crown Jewels'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.4106 63.4269)', 4326, 'axis-order=long-lat'),
  'Kristiansten Fortress'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.4523 63.4483)', 4326, 'axis-order=long-lat'),
  'Ringve Botanical Gardens'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.4546 63.4474)', 4326, 'axis-order=long-lat'),
  'Ringve Museum'
); 

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.3783 63.4301)', 4326, 'axis-order=long-lat'),
  'Norwegian National Museum of Justice'
); 

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.4320 63.4224)', 4326, 'axis-order=long-lat'),
  'Tyholt Tower'
); 

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.4013 63.4389)', 4326, 'axis-order=long-lat'),
  'Rockheim - Museum of Pop and Rock'
); 

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.4031 63.42803)', 4326, 'axis-order=long-lat'),
  'Bicycle Lift'
);

INSERT INTO sights (pos, description) VALUES (
  ST_GeomFromText('POINT(10.4030 63.4281)', 4326, 'axis-order=long-lat'),
  'Bakklandet'
);
