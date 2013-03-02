CREATE TABLE local_files_cache (
	dropboxPath VARCHAR NOT NULL PRIMARY KEY,
	revision INT NOT NULL,
	isOnDisk INT NOT NULL
);

CREATE TABLE data_cache (
	key VARCHAR NOT NULL PRIMARY KEY,
	data VARCHAR NOT NULL
);
