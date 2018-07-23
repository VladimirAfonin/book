<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success">
        <?= $_SESSION['success'];
        unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<h4 class="text-center">Пользователи</h4>
<form action="/" method="post">
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Поиск</span>
            <input type="text"
                   name="search"
                   id="search_text"
                   placeholder="Введите имя..."
                   autocomplete="off"
                   class="form-control"
                   value="<?= $search ?? '' ?>">
        </div>
    </div>
    <!--    простой поиск -->
    <!--    <div class="form-group">-->
    <!--        <button type="submit" name="submit" class="btn btn-success">найти</button>-->
    <!--    </div>-->
</form>
<?php if (isset($users) && !empty($users)): ?>
    <table class="table">
        <thead>
        <tr>
            <th># id</th>
            <th><a href="/?order=login&&sort=<?= $sort ?>&&search=<?= $search ?? '' ?>">Login</a></th>
            <th>Email</th>
            <th><a href="/?order=role&&sort=<?= $sort; ?>&&search=<?= $search ?? '' ?>">Role</a></th>
            <th><a href="/?order=name&&sort=<?= $sort ?>&&search=<?= $search ?? '' ?>">Name</a></th>
            <th colspan="1">Детали</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?= $user['id'] ?></th>
                    <td><?= $user['login'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><a href="/user/one?id=<?= $user['id'] ?>" class="btn btn-default">просмотреть</a>&nbsp;
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
<?php else : ?>
    <p>Записей не найдено, попробуйте снова.</p>
<?php endif; ?>
<a href="/user/edit" class="btn btn-success">редактировать профиль</a>