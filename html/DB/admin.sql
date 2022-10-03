INSERT INTO admin
(
login_id,
name,
pass
)
VALUES(
    'ab1234',
    '山田　太郎',
    SHA2('ab1234', 256)
);