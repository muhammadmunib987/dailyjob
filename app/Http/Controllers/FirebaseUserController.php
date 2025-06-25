<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class FirebaseUserController extends Controller
{
    protected $db;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->db = $firebaseService->getDatabase();
    }

    public function index()
    {
        $users = $this->db->getReference('users')->getValue() ?? [];
        return view('firebase.index', compact('users'));
    }

    public function create()
    {
        return view('firebase.create');
    }

    public function store(Request $request)
    {
        $userData = [
            'name' => $request->name,
            'email' => $request->email
        ];

        $this->db->getReference('users')->push($userData);

        return redirect()->route('firebase.index');
    }

    public function createInterest()
    {
        $users = $this->db->getReference('users')->getValue() ?? [];
        $interests = $this->db->getReference('interests')->getValue() ?? [];

        return view('firebase.create_interest', compact('users', 'interests'));
    }

    public function storeInterest(Request $request)
    {
        $userId = $request->user_id;
        $selectedInterests = $request->interests ?? [];

        $this->db->getReference("user_interests/{$userId}")->set($selectedInterests);

        return redirect()->route('firebase.index');
    }

    
    public function createDummyInterests()
    {
        $interests = [
            'Coding', 'Music', 'Sports', 'Reading', 'Travel'
        ];

        foreach ($interests as $item) {
            $this->db->getReference('interests')->push($item);
        }

        return 'Interests created.';
    }

    public function edit($id){
        $user = $this->db->getReference("users/{$id}")->getValue();
        return view('firebase.edit', compact('user', 'id'));
    }

    public function update(Request $request, $id)
    {
        $this->db->getReference("users/{$id}")->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('firebase.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $this->db->getReference("users/{$id}")->remove();
        $this->db->getReference("user_interests/{$id}")->remove(); // Optional: delete interests too

        return redirect()->route('firebase.index')->with('success', 'User deleted successfully!');
    }

}
