import React, {PropsWithChildren} from "react";
import {Head,useForm, usePage} from "@inertiajs/react";
import LandingLayout from "@/Layouts/LandingLayout";
import {ErrorBag, Errors, PageProps} from "@/types";
import AppstoreImage from "../../images/home/appstore1.png";
import PlaystoreImage from "../../images/home/playstore1.png";
import HeroImage from "../../images/home/hero.webp";

export default function Home({}: PropsWithChildren) {
  const props: Props = usePage().props as Props;
  const locale = props.locale;

  const card: Card = props.card.data;

  console.log(card)

  /*  const {data, setData, post, processing, errors, reset} = useForm({
      email: '',
    })


  const handleSubmit = (e: React.FormEvent<HTMLFormElement> ) => {
    e.preventDefault();
    post(route('subscriptions.store'), {
      preserveScroll: true,
      onSuccess: () => {
        reset('email');

        alert('Message sent successfully!');
      },
      onError: () => {
        alert('Message failed to send!');
      }
    });
  };
  const handleChanges = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setData('email', e.target.value);
  }*/



  return (
    <div>
      <Head title="Welcome" />

      <div className="bg-white">
        <div className="flex flex-col">
          <div className="mb-6 md:mb-12">
            <Card card={card} />
          </div>
          <div className="fixed inset-x-0 bottom-0 z-20 flex-shrink-0 bg-white border border-gray-500 rounded-t-lg drop-shadow-lg">
            <div className="py-4 md:py-6 flex items-center justify-center gap-10">
              <a href={data.playstore.url} className="h-10 md:h-12">
                <img className="h-full w-full object-contain" src={data.playstore.image} alt="playstore" />
              </a>
              <a href={data.appstore.url} className="h-10 md:h-12">
                <img className="h-full w-full object-contain" src={data.appstore.image} alt="appstore" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

const data = {
  appstore: {
    url: '#',
    image: AppstoreImage,
  },
  playstore: {
    url: '#',
    image: PlaystoreImage,
  },
}

function Card({card}: {card: Card}) {
  const {data, setData, post, processing, errors, reset} = useForm({
    email: '',
  })


  const handleSubmit = (e: React.FormEvent<HTMLFormElement> ) => {
    e.preventDefault();
    post(route('subscriptions.store'), {
      preserveScroll: true,
      onSuccess: () => {
        reset('email');

        alert('Message sent successfully!');
      },
      onError: () => {
        alert('Message failed to send!');
      }
    });
  };
  const handleChanges = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setData('email', e.target.value);
  }

  const handleVCard = () => {
    console.log('vcard')
  }


  const handleDownloadVCard = () => {
    const contact = {
      name: card?.full_name,
      phone: card?.phone,
      email: card?.email,
      jobTitle: card?.job_title,
      company: card?.company_name,
      website: card?.url_web_site,
      address: card?.address, // Assuming card.address contains the address info
      socialMedia: card.card_apps.map(app => ({
        name: app.contact?.display_name,
        url: app.contact?.base_url,
      }))
    };

      /*const vcard = `BEGIN:VCARD
      VERSION:4.0
      FN:${contact.name}
      TEL;TYPE=work,voice:${contact.phone}
      EMAIL:${contact.email}
      END:VCARD`;*/

       const vcard = "BEGIN:VCARD\nVERSION:4.0\nFN:" +
           contact.name + "\nTEL;TYPE=work,voice:" +
           contact.phone + "\nEMAIL:" +
           contact.email + "\nTITLE:" +
           contact.jobTitle +"\nORG:" +
           contact.company +"\nURL:" +
           contact.website + "\nADR:" +
           contact.address  +
           contact.socialMedia.map(media => `\nX-SOCIALPROFILE;TYPE:${media.name}:${media.url}`).join('\n') +
           "\nEND:VCARD";

       const blob = new Blob([vcard], { type: "text/vcard" });

        const url = URL.createObjectURL(blob);

        const newLink = document.createElement('a');
        newLink.download = `${contact.name}.vcf`;
        newLink.href = url;
        newLink.click();
      };
  return (
    <div className="relative">
      <div className="h-[30vh] w-full">
        {card?.background && <img className="w-full h-full object-cover" src={card?.background.background} alt="cover"/>}
        {card?.color && <div className={"w-full h-full"} style={{background: card?.color as string}} />}
      </div>
      <div className="-translate-y-16 px-4 max-w-lg mx-auto">
        {/* Avatar component*/}
        <div className="flex flex-col items-center justify-center">
          <img className="w-32 h-32 object-cover rounded-full overflow-hidden ring-4 ring-offset-2 ring-offset-slate-50 ring-sky-500 shadow-lg"
               src={card?.card_avatar} alt="avatar"/>
          <div className="mt-6 text-2xl text-[#2273AF] font-bold">
            {card?.full_name}
          </div>
          <div className="text-base text-[#9CA3AF]">
            {card?.job_title}
          </div>
        </div>

        <div className={'mt-10'}>
          <div className="mb-2 text-base text-[#2273AF] font-bold">
            {'Phone :'} {card?.phone}
          </div>

          <div className="mb-2 text-base text-[#2273AF] font-bold">
            {'Email :'} {card?.email}
          </div>

          <div className="mb-2 text-base text-[#2273AF] font-bold">
            {'Company :'} {card?.company_name}
          </div>
          <div className="mb-2 text-base text-[#2273AF] font-bold">
            {'Web site :'} {card?.url_web_site}
          </div>
          <div className="mb-2 text-base text-[#2273AF] font-bold">
            {'Address :'} {card?.address}
          </div>

        </div>

        <div className={'mt-5'}>
          <div className="text-base text-[#2273AF] font-bold">
            {'Social Media'}
          </div>
          <div className="p-4 grid grid-cols-4 gap-4">
            {card?.card_apps.map((item, index) => (

              <div key={index} className="flex justify-center items-center">
                <a href={item.contact?.base_url}>
                  <div className="w-16 h-16 p-3 bg-gray-200 rounded-lg shadow" style={{background: card?.color as string}}>
                    <img className="w-10 h-10" src={item.contact?.icon} alt="instagram"/>
                  </div>
                </a>

              </div>
            ))}
          </div>
        </div>

        <button
            //type="submit"
            className={'mb-5 flex-shrink-0 px-[3.6875rem] py-[1rem] w-full lg:w-auto h-[3.5rem] rounded-[4.5rem] border-sky-200 shadow-md text-white bg-[#2273AF] border-gray-400 text-gray-50 hover:text-white hover:bg-[#2273AF]/90 focus:outline-none focus:border-gray-700'}
            onClick={handleDownloadVCard}
        >
          {'Add to contact'}
        </button>

        {/*
        <div className={'mt-10'}>
          <div className="text-base text-[#2273AF] font-bold">
            {'Social Media'}
          </div>
          <div className="p-4 grid grid-cols-4 gap-4">
            {[1,2,3,4,5,6,7,8].map((item, index) => (
              <div key={index} className="flex justify-center items-center">
                <Icon color={card?.color?? "#fff"} icon={'instagram'}></Icon>
              </div>
            ))}
          </div>
        </div>
        */
        }

      </div>
      {/*<pre className={"overflow-scroll"}>
          {JSON.stringify(card, null, 2)}
      </pre>*/}

      {/*<form onSubmit={(event) => handleSubmit(event)} className={'max-w-lg mx-auto lg:max-w-5xl flex flex-col lg:flex-col items-center gap-8 ml-5 mr-5'}>
        <input
          type="text"
          placeholder={'Enter your email'}
          value={data['email']}
          onChange={(event) => handleChanges(event)}
          className={'flex-shrink-0 w-full lg:w-[18rem] h-[3.5rem] px-[2rem] py-[1rem] rounded-[4.5rem] hover:shadow border-sky-900 border hover:border-sky-200 focus:border-sky-200 focus:outline-none text-[1.28rem] font-normal leading-10'}
        />
        <button
          type="submit"
          className={'mb-5 flex-shrink-0 px-[3.6875rem] py-[1rem] w-full lg:w-auto h-[3.5rem] rounded-[4.5rem] border-sky-200 shadow-md text-white bg-gradient-to-r from-[#468dcb80] from-10% to-[#45c8f080] to-90% hover:to-100% hover:from-20% hover:shadow-lg'}
        >
          {'Subscribe'}
        </button>
      </form>*/}
    </div>
  )
}

function Icon({icon, color}: {icon: string, color: string}) {
  return (
    <div className="w-16 h-16 p-3 bg-gray-200 rounded-lg shadow" style={{background: color as string}}>
      <img className="w-10 h-10" src={`/images/icons/${icon}.svg`} alt={`${icon}`}/>
    </div>
  )
}

type Card = {
  id: number;
  reference: string;
  name: string;
  full_name: string;
  phone: string;
  email: string;
  url_web_site: string;
  company_name: string;
  company: null;
  job_title: string;
  address: string;
  background: {
    id: number;
    type: string;
    background: string;
  };
  color: string;
  is_single_link: boolean;
  single_link_contact_id: null;
  is_main: boolean;
  card_avatar: string;
  card_apps: any[];
}

type Props = PageProps<any> & { errors: Errors & ErrorBag; locale: string; card: {data: Card} ; };
