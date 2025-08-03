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
        return Draft::query()
            ->where('user_id', $userId)
            ->get();
    }

    static public function getById(int $id, int $userId = 0): Draft
    {
        $draft = Draft::query()
            ->find($id);

        if ($userId >= 1 and $draft->user_id != $userId)
            throw new AuthenticationException('Forbidden');

        return $draft;
    }

    static public function getFieldStep1(Draft $draftHero, int $userId): object
    {
        if ($draftHero->id == null)
            return (object) [
                'hero_name' => null,
                'lvl' => null,
                'exp' => null,
                'klass' => null,
                'sub_klass' => null,
                'race' => null,
                'sub_race' => null,
                'background' => null
            ];

        if ($draftHero->user_id != $userId)
            throw new NotFoundException('Не ваш черновик', 403);

        return (object) $draftHero->only([
            'hero_name',
            'lvl',
            'exp',
            'klass',
            'sub_klass',
            'race',
            'sub_race',
            'background'
        ]);
    }
}
