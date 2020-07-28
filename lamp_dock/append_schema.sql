CREATE TABLE history (
    history_id int(11) NOT NULL AUTO_INCREMENT,
    cart_id int(11) NOT NULL,
    created DATETIME,
    primary key(history_id)
    )