<tbody class="text-gray-700 text-base">
  <?php if(!empty($users)): ?>
    <?php foreach(html_escape($users) as $user): ?>
      <tr class="hover:bg-pink-100 transition duration-200">
        <td class="py-3 px-4 font-medium"><?= $user->id; ?></td>
        <td class="py-3 px-4"><?= $user->fname; ?></td>
        <td class="py-3 px-4"><?= $user->lname; ?></td>
        <td class="py-3 px-4"><?= $user->email; ?></td>
        <td class="py-3 px-4 flex justify-center gap-3">
          <a href="<?= site_url('users/update/'.$user->id); ?>"
             class="btn-hover bg-green-400 hover:bg-green-500 text-white px-3 py-1 rounded-xl shadow flex items-center gap-1">
             Edit
          </a>
          <a href="<?= site_url('users/delete/'.$user->id); ?>"
             class="btn-hover bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded-xl shadow flex items-center gap-1">
             Delete
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr><td colspan="5" class="text-center py-4 text-gray-500">No users found.</td></tr>
  <?php endif; ?>
</tbody>
