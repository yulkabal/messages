<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class NewMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $user = $this->table('users');
        $user->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('login', 'string', ['limit' => 255])
            ->create();

        $message = $this->table('messages');
        $message
            ->addColumn('user_id', 'integer')
            ->addColumn('title', 'string', ['limit' => 255])
            ->addColumn('content', 'string', ['limit' => 255])
            ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->create();

        $comment = $this->table('comments');
        $comment->addColumn('user_id', 'integer')
            ->addColumn('message_id', 'integer')
            ->addColumn('text', 'string', ['limit' => 255])
            ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addForeignKey('message_id', 'messages', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->create();
    }
}
