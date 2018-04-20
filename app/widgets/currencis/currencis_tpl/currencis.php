<select tabindex="4" id="currencis" class="dropdown drop">
    <option value="<?= $currenci['code']; ?>" class="label"><?= $currenci['code']; ?></option>
    <?php foreach( $currencis as $key => $val ) : ?>
        <?php if( $key != $currenci['code'] ) : ?>
            <option value="<?= $key; ?>"><?= $key; ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>