SELECT s.nama, s.wkt_mulai, s.wkt_akhir, b.nama, m.nama, k.nama  FROM t_jpm j
INNER JOIN t_jpm_detail jd ON j.id_jpm=jd.id_jpm_detail
INNER JOIN t_karyawan k ON k.nik=jd.nik
INNER JOIN t_shift s ON j.id_shift=s.id_shift
INNER JOIN t_mesin m ON m.id_mesin=k.id_mesin
INNER JOIN t_bagian b ON b.id_bagian=m.id_bagian
