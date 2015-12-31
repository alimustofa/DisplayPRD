SELECT s.nama, s.wkt_mulai, s.wkt_akhir, b.nama, m.nama, k.nama  FROM t_stl st
INNER JOIN t_stl_detail sd ON st.id_stl=sd.id_stl_detail
INNER JOIN t_karyawan k ON k.nik=sd.nik
INNER JOIN t_shift s ON st.id_shift=s.id_shift
INNER JOIN t_mesin m ON m.id_mesin=k.id_mesin
INNER JOIN t_bagian b ON b.id_bagian=m.id_bagian
