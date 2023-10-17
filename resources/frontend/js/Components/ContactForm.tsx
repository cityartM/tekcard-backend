import React from "react";
import {useForm} from "@inertiajs/react";
import InputLabel from "./Label";
import TextArea from "./TextArea";
import InputError from "./InputError";
import TextInput from "./Input";

const fields: { name: string; label: string; placeholder: string; type: string }[] = [
  {
    name: 'name',
    type: 'text',
    label: 'Full name *',
    placeholder: 'Enter your name',
  },
  {
    name: 'email',
    type: 'email',
    label: 'Your email *',
    placeholder: 'Enter your email',
  },
  {
    name: 'company',
    type: 'text',
    label: 'Company *',
    placeholder: 'Enter your company',
  },
  {
    name: 'subject',
    type: 'text',
    label: 'Subject *',
    placeholder: 'How can we Help',
  },
  {
    name: 'message',
    type: 'textarea',
    label: 'Message',
    placeholder: 'Hello there,I would like to talk about how to...',
  },
];

const ContactForm: React.FC<any> = ({}) => {

  const { data, setData, post, processing, errors, reset} = useForm({
    name: '',
    email: '',
    company: '',
    subject: '',
    message: '',
  });

  const handleSubmit = (e: React.FormEvent<HTMLFormElement> ) => {
    e.preventDefault();
    post(route('landing.contact-us.submit'), {
      preserveScroll: true,
      onSuccess: () => {
        reset('name', 'email', 'company', 'subject', 'message');

        alert('Message sent successfully!');
      },
      onError: () => {
        alert('Message failed to send!');
      }
    });
  };

  const handleChanges = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setData(e.target.id as keyof typeof data, e.target.value);
  }

  return (
    <form onSubmit={(event) => handleSubmit(event)}>
      <div className={'flex flex-col space-y-10'}>
        {fields.map((field) => {
          if (field.type === 'textarea') {
            return <div key={field.name} className={'flex flex-col space-y-4'}>
              <InputLabel htmlFor={field.name} value={field.label} />
              <TextArea
                id={field.name}
                {...field}
                value={data[field.name as keyof typeof data]}
                onChange={e => handleChanges(e)}
              />
              {errors[field.name as keyof typeof errors] &&
                  <InputError message={errors[field.name as keyof typeof errors]}/>}
            </div>;
          } else {
            return <div key={field.name} className={'flex flex-col space-y-4'}>
              <InputLabel htmlFor={field.name} value={field.label}/>
              <TextInput
                id={field.name}
                {...field}
                value={data[field.name as keyof typeof data]}
                onChange={e => handleChanges(e)}
              />
              {errors[field.name as keyof typeof errors] &&
                  <InputError message={errors[field.name as keyof typeof errors]}/>}
            </div>;
          }
        })}
        <div className={'flex items-center justify-center gap-8'}>
          <button disabled={processing} type="submit" className={'bg-[#478DCB] text-white font-medium text-lg py-4 px-10 rounded-2xl shadow-md hover:bg-[#29A0F5] transition duration-300 ease-in-out'}>
            {'Send Message'}
          </button>
        </div>
      </div>
    </form>
  );
}

export default ContactForm;
