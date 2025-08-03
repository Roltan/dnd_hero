<?

namespace App\Repositories;

use App\Exceptions\AuthenticationException;
use App\Exceptions\NotFoundException;
use App\Models\Draft;
use Illuminate\Database\Eloquent\Collection;

class DraftRepository
{
    static public function getByUser(int $userId): array|Collection
    {
        $draft = Draft::query()
            ->where('user_id', $userId)
            ->get();

        if (!$draft)
            throw  new NotFoundException('Draft not found');

        return $draft;
    }

    static public function getById(int $id, int $userId = 0): Draft
    {
        $draft = Draft::query()
            ->find($id);

        if (!$draft)
            throw new NotFoundException('Draft not found');

        if ($userId >= 1 and $draft->user_id != $userId)
            throw new AuthenticationException('Forbidden');

        return $draft;
    }
}
