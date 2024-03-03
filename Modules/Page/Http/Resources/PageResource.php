<?php

namespace Modules\Page\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Page\Models\Page;

class PageResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'description' => $this->description,
            
        ];
    }
}


/*
const post: Post = {
  id: 1,
  title: 'Boost your conversion rate',
  href: '#',
  description: 'Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.',
  content: '<p>Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>\r\n<p style="text-align: left;">&nbsp;<\/p>\r\n<p style="text-align: left;"><img src="https://images.unsplash.com/photo-1682687982470-8f1b0e79151a?auto=format&amp;fit=crop&amp;q=60&amp;w=800&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHw2fHx8ZW58MHx8fHx8" alt="fsdfdsfs" width="772" height="162" /></p>',
  imageUrl: 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80',
  date: 'Mar 16, 2020',
  datetime: '2020-03-16',
  category: { title: 'Marketing', href: '#' },
  author: {
    name: 'Michael Foster',
    role: 'Co-Founder / CTO',
    href: '#',
    imageUrl: 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
  },
}
*/
