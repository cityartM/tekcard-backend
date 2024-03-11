import React, { PropsWithChildren } from "react";
import { Head, usePage } from "@inertiajs/react";
import LandingLayout from "@/Layouts/LandingLayout";
import { ErrorBag, Errors, PageProps } from "@/types";
import AppstoreImage from "../../images/home/appstore1.png";
import PlaystoreImage from "../../images/home/playstore1.png";
import HeroImage from "../../images/home/hero.webp";

export default function Home({}: PropsWithChildren) {
  const props: Props = usePage().props as Props;
  const locale = props.locale;

  const card: Card = props.card.data;

  console.log(card);

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
                <img
                  className="h-full w-full object-contain"
                  src={data.playstore.image}
                  alt="playstore"
                />
              </a>
              <a href={data.appstore.url} className="h-10 md:h-12">
                <img
                  className="h-full w-full object-contain"
                  src={data.appstore.image}
                  alt="appstore"
                />
              </a>
            </div>
          </div>
        </div>
      </div>

      <form
        method="POST"
        action={`{{ route('send-card-by-email', ['card' => ${card.id}]) }}`}
        style={{
          maxWidth: "400px",
          margin: "0 auto",
          textAlign: "center"
        }}
      >
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input
          type="email"
          name="email"
          placeholder="Enter your email"
          required
          style={{
            width: "100%",
            padding: "10px",
            marginBottom: "10px",
            border: "1px solid #ccc",
            borderRadius: "5px",
            boxSizing: "border-box",
            fontSize: "16px"
          }}
        />
        <button
          type="submit"
          className="send-email-btn"
          style={{
            backgroundColor: "#007bff",
            color: "#fff",
            border: "none",
            borderRadius: "5px",
            padding: "10px 20px",
            cursor: "pointer",
            fontSize: "16px",
            transition: "background-color 0.3s"
          }}
        >
          Send Card via Email
        </button>
      </form>
    </div>
  );
}

const data = {
  appstore: {
    url: "#",
    image: AppstoreImage,
  },
  playstore: {
    url: "#",
    image: PlaystoreImage,
  },
};

function Card({ card }: { card: Card }) {
  return (
    <div className="relative">
      <div className="h-[30vh] w-full">
        {card.background && (
          <img
            className="w-full h-full object-cover"
            src={card.background.background}
            alt="cover"
          />
        )}
        {card.color && <div className={"w-full h-full"} style={{ background: card.color as string }} />}
      </div>
      <div className="-translate-y-16 px-4 max-w-lg mx-auto">
        {/* Avatar component*/}
        <div className="flex flex-col items-center justify-center">
          <img
            className="w-32 h-32 object-cover rounded-full overflow-hidden ring-4 ring-offset-2 ring-offset-slate-50 ring-sky-500 shadow-lg"
            src="https://picsum.photos/200/300"
            alt="avatar"
          />
          <div className="mt-6 text-2xl text-[#2273AF] font-bold">{card.full_name}</div>
          <div className="text-base text-[#9CA3AF]">{card.job_title}</div>
        </div>

        <div className={"mt-10"}>
          <div className="text-base text-[#2273AF] font-bold">{"Social Media"}</div>
          <div className="p-4 grid grid-cols-4 gap-4">
            {[1, 2, 3, 4, 5, 6, 7, 8].map((item, index) => (
              <div key={index} className="flex justify-center items-center">
                <div className="w-16 h-16 p-3 bg-gray-200 rounded-lg shadow" style={{ background: card?.color as string }}>
                  <img className="w-10 h-10" src="/images/icons/instagram.svg" alt="instagram" />
                </div>
              </div>
            ))}
          </div>
        </div>

        <div className={"mt-10"}>
          <div className="text-base text-[#2273AF] font-bold">{"Social Media"}</div>
          <div className="p-4 grid grid-cols-4 gap-4">
            {[1, 2, 3, 4, 5, 6, 7, 8].map((item, index) => (
              <div key={index} className="flex justify-center items-center">
                <Icon color={card?.color ?? "#fff"} icon={"instagram"}></Icon>
              </div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
}

function Icon({ icon, color }: { icon: string; color: string }) {
  return (
    <div className="w-16 h-16 p-3 bg-gray-200 rounded-lg shadow" style={{ background: color as string }}>
      <img className="w-10 h-10" src={`/images/icons/${icon}.svg`} alt={`${icon}`} />
    </div>
  );
}

type Card = {
  id: number;
  reference: string;
  name: string;
  full_name: string;
  company_name: string;
  company: null;
  job_title: string;
  background: {
    id: number;
    type: string;
    background: string;
  };
  color: string;
  is_single_link: boolean;
  single_link_contact_id: null;
  is_main: boolean;
  card_avatar: null;
  card_apps: any[];
};

type Props = PageProps<any> & { errors: Errors & ErrorBag; locale: string; card: { data: Card } };
