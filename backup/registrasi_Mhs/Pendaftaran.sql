DROP TABLE registrasimhs;

CREATE TABLE `registrasimhs` (
  `username` int(30) NOT NULL,
  `transkrip` varchar(30) NOT NULL,
  `krs` varchar(30) NOT NULL,
  `spdp` varchar(30) NOT NULL,
  `ktm` varchar(30) NOT NULL,
  `tanggal` int(2) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `terverifikasi` int(1) NOT NULL,
  `dilihat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO registrasimhs VALUES("1110963005","1110963005.sql","1110963005.txt","1110963005.vpp","1110963005.php","19","5","2015","0","0");
INSERT INTO registrasimhs VALUES("1110962024","1110962024.png","1110962024.png","1110962024.png","1110962024.jpg","27","5","2015","0","");



